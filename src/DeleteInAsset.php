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
use yii\web\AssetBundle;

/**
 * Class DeleteInAsset
 *
 * @package yongtiger\admin
 */
class DeleteInAsset extends AssetBundle
{
    public $sourcePath = '@yongtiger/admin/assets';

    public $js = [
        'js/delete-in.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}