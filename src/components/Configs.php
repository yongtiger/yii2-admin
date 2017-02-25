<?php ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/

/**
 * Yii2 admin
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/admin
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

namespace yongtiger\admin\components;

use Yii;
use yii\caching\Cache;
use yii\db\Connection;
use yii\di\Instance;
use yii\helpers\ArrayHelper;
use yii\rbac\ManagerInterface;
use yongtiger\admin\models\Route;

/**
 * Class Configs
 *
 * Used to configure some values. To set config you can use [[\yii\base\Application::$params]]
 *
 * ```
 * return [
 *
 *     'yongtiger.admin.configs' => [
 *         'db' => 'customDb',
 *         'menuTable' => '{{%admin_menu}}',
 *         'cache' => [
 *             'class' => 'yii\caching\DbCache',
 *             'db' => ['dsn' => 'sqlite:@runtime/admin-cache.db'],
 *         ],
 *     ]
 * ];
 * ```
 *
 * or use [[\Yii::$container]]
 *
 * ```
 * Yii::$container->set('yongtiger\admin\components\Configs',[
 *     'db' => 'customDb',
 *     'menuTable' => 'admin_menu',
 * ]);
 * ```
 *
 * @package yongtiger\admin\components
 */
class Configs extends \yii\base\Object
{
    const CACHE_TAG = 'yongtiger.admin';

    /**
     * @var ManagerInterface .
     */
    public $authManager = 'authManager';

    /**
     * @var Connection Database connection.
     */
    public $db = 'db';

    /**
     * @var Cache Cache component.
     */
    public $cache = 'cache';

    /**
     * @var integer Cache duration. Default to a hour.
     */
    public $cacheDuration = 3600;

    /**
     * @var string Menu table name.
     */
    public $menuTable = '{{%menu}}';

    /**
     * @var boolean If true then AccessControl only check if route are registered.
     */
    public $onlyRegisteredRoute = false;

    /**
     * @var boolean If false then AccessControl will check without Rule.
     */
    public $strict = true;

    /**
     * @var array
     */
    public $options;

    ///[yii2-brainbase v0.3.0 (admin:rbac):fix Added multi app (frontend/backend)]@see https://github.com/mdmsoft/yii2-admin/pull/309/
    /**
     * @var array|false
     */
    public $advanced;
    /**
     * @var string
     */
    public $routePrefix;
    ///[http://www.brainbook.cc]
    
    /**
     * @var self Instance of self
     */
    private static $_instance;

    /**
     * @var array
     */
    private static $_classes = [
        'db' => 'yii\db\Connection',
        'cache' => 'yii\caching\Cache',
        'authManager' => 'yii\rbac\ManagerInterface',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        foreach (self::$_classes as $key => $class) {
            try {
                $this->{$key} = empty($this->{$key}) ? null : Instance::ensure($this->{$key}, $class);
            } catch (\Exception $exc) {
                $this->{$key} = null;
                Yii::error($exc->getMessage());
            }
        }

        ///[yii2-brainbase v0.4.4 (admin:fix# mdmsoft/yii2-admin multi app)]
        $this->routePrefix = $this->advanced ? Route::PREFIX_ADVANCED : Route::PREFIX_BASIC;
    }

    /**
     * Create instance of self
     * @return static
     */
    public static function instance()
    {
        if (self::$_instance === null) {
            $type = ArrayHelper::getValue(Yii::$app->params, 'yongtiger.admin.configs', []);
            if (is_array($type) && !isset($type['class'])) {
                $type['class'] = static::className();
            }
            return self::$_instance = Yii::createObject($type);
        }
        return self::$_instance;
    }

    /**
     * @inheritdoc
     */
    public static function __callStatic($name, $arguments)
    {
        $instance = static::instance();
        if ($instance->hasProperty($name)) {
            return $instance->$name;
        } else {
            if (count($arguments)) {
                $instance->options[$name] = reset($arguments);
            } else {
                return array_key_exists($name, $instance->options) ? $instance->options[$name] : null;
            }
        }
    }

    /**
     * @return Connection
     */
    public static function db()
    {
        return static::instance()->db;
    }

    /**
     * @return Cache
     */
    public static function cache()
    {
        return static::instance()->cache;
    }

    /**
     * @return ManagerInterface
     */
    public static function authManager()
    {
        return static::instance()->authManager;
    }

    /**
     * @return integer
     */
    public static function cacheDuration()
    {
        return static::instance()->cacheDuration;
    }

    /**
     * @return string
     */
    public static function menuTable()
    {
        return static::instance()->menuTable;
    }

    /**
     * @return boolean
     */
    public static function onlyRegisteredRoute()
    {
        return static::instance()->onlyRegisteredRoute;
    }

    /**
     * @return boolean
     */
    public static function strict()
    {
        return static::instance()->strict;
    }
}