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
    public $defaultRoute = 'route';

    /**
     * @var string Default url for breadcrumb
     */
    public $defaultUrl;

    /**
     * @var string Default url label for breadcrumb
     */
    public $defaultUrlLabel;

    ///[yii2-admin release version 2.6.2 (view params & i18n)]
    /**
     * Registers the translation files.
     */
    public static function registerTranslations()
    {
        ///[i18n]
        ///if no setup the component i18n, use setup in this module.
        if (!isset(Yii::$app->i18n->translations['extensions/yongtiger/yii2-admin/*']) && !isset(Yii::$app->i18n->translations['extensions/yongtiger/yii2-admin'])) {
            Yii::$app->i18n->translations['extensions/yongtiger/yii2-admin/*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => '@vendor/yongtiger/yii2-admin/src/messages',    ///default base path is '@vendor/yongtiger/yii2-admin/src/messages'
                'fileMap' => [
                    'extensions/yongtiger/yii2-admin/message' => 'message.php',  ///category in Module::t() is message
                ],
            ];
        }
    }

    /**
     * Translates a message. This is just a wrapper of Yii::t().
     *
     * @see http://www.yiiframework.com/doc-2.0/yii-baseyii.html#t()-detail
     *
     * @param $category
     * @param $message
     * @param array $params
     * @param null $language
     * @return string
     */
    public static function t($category, $message, $params = [], $language = null)
    {
        static::registerTranslations(); ///[yii2-admin release version 2.6.2 (view params & i18n)]
        return Yii::t('extensions/yongtiger/yii2-admin/' . $category, $message, $params, $language);
    }
}
