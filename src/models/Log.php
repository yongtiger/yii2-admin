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

namespace yongtiger\admin\models;

use Yii;
use yii\helpers\Url;
use yongtiger\admin\components\Configs;
use yongtiger\admin\Module;

/**
 * This is the model class for table "admin_log".
 *
 * @property integer $id
 * @property string $route
 * @property string $description
 * @property integer $user_id
 * @property integer $created_at
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return Configs::instance()->logTable;   ///[2.9.0 (CHG# logTable, menuTable)]
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['user_id', 'created_at'], 'integer'],
            [['created_at'], 'required'],
            [['route', 'user_ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route' => Module::t('message', 'Route'),
            'description' => Module::t('message', 'Description'),
            'user_id' => 'User ID',
            'user_ip' => 'User IP',
            'created_at' => Module::t('message', 'Created At'),
        ];
    }

    /**
     * Creates a log.
     */
    public static function createLog()
    {
        ///Ignore guset debug
        list ($route, $params) = Yii::$app->getRequest()->resolve();
        if(strpos($route, 'debug/default/toolbar') !== false)
            return;

        $route = Url::to(); ///an empty string: the currently requested URL will be returned;
        $description = '';
        $userId = (int)Yii::$app->user->id;

        $userIP = Yii::$app->request->userIP;

        $model = new Log();
        $data = [
            'route' => $route,
            'description' => $description,
            'user_id' => $userId,
            'user_ip' => $userIP,
            'created_at' => time(),
        ];
        $model->setAttributes($data);
        $model->save(false);
    }
}
