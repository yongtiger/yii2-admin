<?php ///[yii2-admin]

/**
 * Yii2 admin
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/yii2-admin
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

namespace yongtiger\admin\components;

use Yii;
use yii\di\Instance;
use yii\base\Module;
use yii\web\User;
use yii\web\ForbiddenHttpException;
use yii\helpers\ArrayHelper;
use yongtiger\application\Application;

/**
 * Access Control Filter (ACF) is a simple authorization method that is best used by applications that only need some simple access control. 
 * As its name indicates, ACF is an action filter that can be attached to a controller or a module as a behavior. 
 * ACF will check a set of access rules to make sure the current user can access the requested action.
 *
 * To use AccessControl, declare it in the application config as behavior.
 * For example.
 *
 * ```
 * 'as access' => [
 *     'class' => 'yongtiger\admin\components\AccessControl',
 *     'allowActions' => ['site/login', 'site/error']
 * ]
 * ```
 *
 * @package yongtiger\admin\components
 * 
 */
class AccessControl extends \yii\base\ActionFilter
{
    /**
     * @var User User for check access.
     */
    private $_user = 'user';

    /**
     * @var array List of action that not need to check access.
     */
    public $allowActions = [];

    /**
     * Get user
     * @return yii\web\User
     */
    public function getUser()
    {
        if (!$this->_user instanceof User) {
            $this->_user = Instance::ensure($this->_user, User::className());
        }
        return $this->_user;
    }

    /**
     * Set user
     * @param User $user
     */
    public function setUser($user)
    {
        $this->_user = $user;
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        $actionId = $action->getUniqueId();
        $user = $this->getUser();

        if (Helper::checkRoute('/' . $actionId, Yii::$app->getRequest()->get(), $user)) {

            ///[2.7.2 (CHG# yongtiger.admin.configs:log)]
            if (is_array(Configs::instance()->log) && in_array(Yii::$app->id, Configs::instance()->log)) {
                \yongtiger\admin\models\Log::createLog();   ///[2.7.0 (admin log)]
            }

            return true;
        }
        $this->denyAccess($user);
    }

    /**
     * Denies the access of the user.
     * The default implementation will redirect the user to the login page if he is a guest;
     * if the user is already logged, a 403 HTTP exception will be thrown.
     * @param  User $user the current user
     * @throws ForbiddenHttpException if the user is already logged in.
     */
    protected function denyAccess($user)
    {
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            throw new ForbiddenHttpException(Yii::t('yii', 'You are not allowed to perform this action.'));
        }
    }

    /**
     * @inheritdoc
     */
    protected function isActive($action)
    {
        $uniqueId = $action->getUniqueId();
        if ($uniqueId === Yii::$app->getErrorHandler()->errorAction) {

            ///[yii2-admin 1.1.1 (admin:return home when guest accesses an invalid route)]
            if (Yii::$app->user->isGuest) {
                //$this->goHome()->send();  ///while in controller!
                // Yii::$app->getResponse()->redirect(Yii::$app->user->loginUrl)->send();   ///ok!
                Yii::$app->getResponse()->redirect(Yii::$app->user->loginUrl);
                // Yii::$app->user->loginRequired();   ///ok!
                Yii::$app->end();   ///exit immediately and terminate subsequent code execution
            }
            return false;
        }

        $user = $this->getUser();
        if($user->getIsGuest())
        {
            $loginUrl = null;
            if(is_array($user->loginUrl) && isset($user->loginUrl[0])){
                $loginUrl = $user->loginUrl[0];
            }else if(is_string($user->loginUrl)){
                $loginUrl = $user->loginUrl;
            }
            if(!is_null($loginUrl) && trim($loginUrl,'/') === $uniqueId)
            {

                ///[yii2-admin 1.1.0 (admin:permission_access_backend)]
                Yii::$app->user->on(yii\web\User::EVENT_BEFORE_LOGIN, function ($event) {
                    Yii::$app->user->setIdentity($event->identity);
                    if (!Yii::$app->user->can('permission_access_' . Yii::$app->id)) {
                        Yii::$app->getSession()->setFlash('error', Yii::t('yii', 'You are not allowed to perform this action.'));
                        //$this->goHome()->send();  ///while in controller!
                        // Yii::$app->getResponse()->redirect(Yii::$app->user->loginUrl)->send();   ///ok!
                        Yii::$app->getResponse()->redirect(Yii::$app->user->loginUrl);
                        // Yii::$app->user->loginRequired();    ///wrong!
                        Yii::$app->end();   ///exit immediately and terminate subsequent code execution
                        $event->handled = true;
                    }
                });
                
                return false;
            }
        }

        if ($this->owner instanceof Module) {
            // convert action uniqueId into an ID relative to the module
            $mid = $this->owner->getUniqueId();
            $id = $uniqueId;
            if ($mid !== '' && strpos($id, $mid . '/') === 0) {
                $id = substr($id, strlen($mid) + 1);
            }
        } else {
            $id = $action->id;
        }

        foreach ($this->allowActions as $route) {
            if (substr($route, -1) === '*') {
                $route = rtrim($route, '*');
                if ($route === '' || strpos($id, $route) === 0) {
                    return false;
                }
            } else {
                if ($id === $route) {
                    return false;
                }
            }
        }

        if ($action->controller->hasMethod('allowAction') && in_array($action->id, $action->controller->allowAction())) {
            return false;
        }

        return true;
    }
}
