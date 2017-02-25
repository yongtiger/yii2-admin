<?php ///[yii2-admin]

/**
 * Yii2 admin
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/admin
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

namespace yongtiger\admin;

use Yii;

/**
 * GUI manager for RBAC.
 *
 * Use [[\yii\base\Module::$controllerMap]] to change property of controller.   ///??????
 *
 * ```
 * 'controllerMap' => [
 *     'assignment' => [
 *         'class' => 'yongtiger\admin\controllers\AssignmentController',
 *         'userClassName' => 'app\models\User',
 *         'idField' => 'id'
 *     ]
 * ],
 * ```
 *
 * @package yongtiger\admin
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $defaultRoute = 'menu';

    /**
     * @var string Default url for breadcrumb
     */
    public $defaultUrl;

    /**
     * @var string Default url label for breadcrumb
     */
    public $defaultUrlLabel;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset(Yii::$app->i18n->translations['rbac-admin'])) {
            Yii::$app->i18n->translations['rbac-admin'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en',
                'basePath' => '@yongtiger/admin/messages',
            ];
        }
    }

    /**
     * @inheritdoc
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {

            $view = $action->controller->getView();

            $view->params['breadcrumbs'][] = [
                'label' => ($this->defaultUrlLabel ?: Yii::t('rbac-admin', 'RBAC')),
                'url' => ['/' . ($this->defaultUrl ?: $this->uniqueId)],
            ];
            return true;
        }
        return false;
    }
}
