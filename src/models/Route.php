<?php ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/

/**
 * Yii2 admin
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/yii2-admin
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

namespace yongtiger\admin\models;

use Yii;
use yii\caching\TagDependency;
use yii\helpers\VarDumper;
use yongtiger\admin\components\Configs;
use yongtiger\admin\components\Helper;
use yongtiger\admin\components\RouteRule;
use yongtiger\application\Application;

/**
 * Class Route
 *
 * @package yongtiger\admin\models
 */
class Route extends \yii\base\Object
{
    const CACHE_TAG = 'yongtiger.admin.route';

    ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/
    const PREFIX_ADVANCED = '@';
    const PREFIX_BASIC = '/';
    private $_routePrefix;
    ///[http://www.brainbook.cc]

    /**
     * Assign or remove items
     * @param array $routes
     * @return array
     */
    public function addNew($routes)
    {
        $manager = Configs::authManager();
        foreach ($routes as $route) {
            try {
                $r = explode('&', $route);
                $item = $manager->createPermission($this->getPermissionName($route));   ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/
                if (count($r) > 1) {
                    $action = '/' . trim($r[0], '/');
                    if (($itemAction = $manager->getPermission($action)) === null) {
                        $itemAction = $manager->createPermission($action);
                        $manager->add($itemAction);
                    }
                    unset($r[0]);
                    foreach ($r as $part) {
                        $part = explode('=', $part);
                        $item->data['params'][$part[0]] = isset($part[1]) ? $part[1] : '';
                    }
                    $this->setDefaultRule();
                    $item->ruleName = RouteRule::RULE_NAME;
                    $manager->add($item);
                    $manager->addChild($item, $itemAction);
                } else {
                    $manager->add($item);
                }
            } catch (\Exception $exc) {
                Yii::error($exc->getMessage(), __METHOD__);
            }
        }
        Helper::invalidate();
    }

    /**
     * Assign or remove items
     * @param array $routes
     * @return array
     */
    public function remove($routes)
    {
        $manager = Configs::authManager();
        foreach ($routes as $route) {
            try {
                $item = $manager->createPermission($this->getPermissionName($route));   ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/
                $manager->remove($item);
            } catch (\Exception $exc) {
                Yii::error($exc->getMessage(), __METHOD__);
            }
        }
        Helper::invalidate();
    }

    ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/
    /**
     * Returns route prefix depending on the configuration.
     * @return string Route prefix
     */
    public function getRoutePrefix()
    {
        if (!$this->_routePrefix) {
            $this->_routePrefix = Configs::instance()->advanced ? self::PREFIX_ADVANCED : self::PREFIX_BASIC;
        }
        return $this->_routePrefix;
    }

    /**
     * Returns the correct permission name depending on the configuration.
     * @param  string $route Route
     * @return string        Permission name
     */
    public function getPermissionName($route)
    {
        if (self::PREFIX_BASIC == $this->routePrefix) {
            return self::PREFIX_BASIC . trim($route, self::PREFIX_BASIC);
        } else {
            return self::PREFIX_ADVANCED . ltrim(trim($route, self::PREFIX_BASIC), self::PREFIX_ADVANCED);
        }
    }
    ///[http://www.brainbook.cc]

    /**
     * Get available and assigned routes
     * @return array
     */
    public function getRoutes()
    {

        $manager = Configs::authManager();

        ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/
        // Get advanced configuration
        $advanced = Configs::instance()->advanced;
        if ($advanced) {
            // Use advanced route scheme.
            // Set advanced route prefix.
            $this->_routePrefix = self::PREFIX_ADVANCED;

            // Create empty routes array.
            $routes = [];

            // Step through each configured application
            foreach ($advanced as $id => $configPaths) {

                ///[2.6.7 (CHG# advanced, \yongtiger\application\Application::remoteAppConfigs)]
                Application::remoteAppCall($id, function ($app) use (&$routes, $id)  {
                    // Prepend the app id to all routes.
                    foreach ($this->getAppRoutes($app) as $route) {
                        // Force correct id string.
                        $id = $this->routePrefix . ltrim(trim($id), $this->routePrefix);
                        $routes[$id . $route] = $id . $route;
                    }
                }, function ($config) {
                    unset($config['bootstrap']);    ///[yii2-brainbase v0.3.0 (admin:rbac):fix Yii debug disappear in route]
                    return $config;
                });

            }
        } else {
            // Use basic route scheme.
            // Set basic route prefix
            $this->_routePrefix = self::PREFIX_BASIC;

            // Get basic app routes.
            $routes = $this->getAppRoutes();
        }
        ///[http://www.brainbook.cc]

        $exists = [];
        foreach (array_keys($manager->getPermissions()) as $name) {

            // if ($name[0] !== '/') {
            if ($name[0] !== $this->routePrefix) {  ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/
                continue;
            }

            $exists[] = $name;
            unset($routes[$name]);
        }
        return [
            'available' => array_keys($routes),
            'assigned' => $exists,
        ];
    }

    /**
     * Get list of application routes
     * @return array
     */
    public function getAppRoutes($module = null)
    {
        if ($module === null) {
            $module = Yii::$app;
        } elseif (is_string($module)) {
            $module = Yii::$app->getModule($module);
        }
        $key = [__METHOD__, Yii::$app->id, $module->getUniqueId()];
        $cache = Configs::instance()->cache;
        if ($cache === null || ($result = $cache->get($key)) === false) {
            $result = [];
            $this->getRouteRecursive($module, $result);
            if ($cache !== null) {
                $cache->set($key, $result, Configs::instance()->cacheDuration, new TagDependency([
                    'tags' => self::CACHE_TAG,
                ]));
            }
        }
        return $result;
    }

    /**
     * Get route(s) recursive
     * @param \yii\base\Module $module
     * @param array $result
     */
    protected function getRouteRecursive($module, &$result)
    {
        $token = "Get Route of '" . get_class($module) . "' with id '" . $module->uniqueId . "'";
        Yii::beginProfile($token, __METHOD__);
        try {
            foreach ($module->getModules() as $id => $child) {
                if (($child = $module->getModule($id)) !== null) {
                    $this->getRouteRecursive($child, $result);
                }
            }
            foreach ($module->controllerMap as $id => $type) {
                $this->getControllerActions($type, $id, $module, $result);
            }
            $namespace = trim($module->controllerNamespace, '\\') . '\\';
            $this->getControllerFiles($module, $namespace, '', $result);
            $all = '/' . ltrim($module->uniqueId . '/*', '/');
            $result[$all] = $all;
        } catch (\Exception $exc) {
            Yii::error($exc->getMessage(), __METHOD__);
        }
        Yii::endProfile($token, __METHOD__);
    }

    /**
     * Get list controller under module
     * @param \yii\base\Module $module
     * @param string $namespace
     * @param string $prefix
     * @param mixed $result
     * @return mixed
     */
    protected function getControllerFiles($module, $namespace, $prefix, &$result)
    {
        $path = Yii::getAlias('@'. str_replace('\\', '/', $namespace), false);
        $token = "Get controllers from '$path'";
        Yii::beginProfile($token, __METHOD__);
        try {
            if (!is_dir($path)) {
                return;
            }
            foreach (scandir($path) as $file) {
                if ($file == '.' || $file == '..') {
                    continue;
                }
                if (is_dir($path . '/' . $file) && preg_match('%^[a-z0-9_/]+$%i', $file . '/')) {
                    $this->getControllerFiles($module, $namespace . $file . '\\', $prefix . $file . '/', $result);
                } elseif (strcmp(substr($file, -14), 'Controller.php') === 0) {
                    $baseName = substr(basename($file), 0, -14);
                    $name = strtolower(preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $baseName));
                    $id = ltrim(str_replace(' ', '-', $name), '-');
                    $className = $namespace . $baseName . 'Controller';
                    if (strpos($className, '-') === false && class_exists($className) && is_subclass_of($className, 'yii\base\Controller')) {
                        $this->getControllerActions($className, $prefix . $id, $module, $result);
                    }
                }
            }
        } catch (\Exception $exc) {
            Yii::error($exc->getMessage(), __METHOD__);
        }
        Yii::endProfile($token, __METHOD__);
    }

    /**
     * Get list action of controller
     * @param mixed $type
     * @param string $id
     * @param \yii\base\Module $module
     * @param string $result
     */
    protected function getControllerActions($type, $id, $module, &$result)
    {
        $token = "Create controller with cofig=" . VarDumper::dumpAsString($type) . " and id='$id'";
        Yii::beginProfile($token, __METHOD__);
        try {
            /* @var $controller \yii\base\Controller */
            $controller = Yii::createObject($type, [$id, $module]);
            $this->getActionRoutes($controller, $result);
            $all = "/{$controller->uniqueId}/*";
            $result[$all] = $all;
        } catch (\Exception $exc) {
            Yii::error($exc->getMessage(), __METHOD__);
        }
        Yii::endProfile($token, __METHOD__);
    }

    /**
     * Get route of action
     * @param \yii\base\Controller $controller
     * @param array $result all controller action.
     */
    protected function getActionRoutes($controller, &$result)
    {
        $token = "Get actions of controller '" . $controller->uniqueId . "'";
        Yii::beginProfile($token, __METHOD__);
        try {
            $prefix = '/' . $controller->uniqueId . '/';
            foreach ($controller->actions() as $id => $value) {
                $result[$prefix . $id] = $prefix . $id;
            }
            $class = new \ReflectionClass($controller);
            foreach ($class->getMethods() as $method) {
                $name = $method->getName();
                if ($method->isPublic() && !$method->isStatic() && strpos($name, 'action') === 0 && $name !== 'actions') {
                    $name = strtolower(preg_replace('/(?<![A-Z])[A-Z]/', ' \0', substr($name, 6)));
                    $id = $prefix . ltrim(str_replace(' ', '-', $name), '-');
                    $result[$id] = $id;
                }
            }
        } catch (\Exception $exc) {
            Yii::error($exc->getMessage(), __METHOD__);
        }
        Yii::endProfile($token, __METHOD__);
    }

    /**
     * Ivalidate cache
     */
    public static function invalidate()
    {
        if (Configs::cache() !== null) {
            TagDependency::invalidate(Configs::cache(), self::CACHE_TAG);
        }
    }
    
    /**
     * Set default rule of parameterize route.
     */
    protected function setDefaultRule()
    {
        if (Configs::authManager()->getRule(RouteRule::RULE_NAME) === null) {
            Configs::authManager()->add(new RouteRule());
        }
    }
}