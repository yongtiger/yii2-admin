<?php ///[yii2-adminlte-asset]

/**
 * Yii2 adminlte asset
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/adminlte-asset
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

/**
 * @var $this yii\base\View
 * @var $directoryAsset string
 * @var $userAvatar string User's avatar image url
 *
 * Sets the params parameter `userAvatar` for the current view:
 *
 * ```php
 * public function actionIndex()
 * {
 *     Yii::$app->view->params['userAvatar'] = '/img/user2-160x160.jpg';
 * 
 *     return $this->render('index');
 * }
 * ```
 *
 */

use yongtiger\adminlteasset\widgets\Menu;
use yongtiger\admin\components\MenuHelper;

?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= isset($this->params['userAvatar']) ? $this->params['userAvatar'] : $directoryAsset . '/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Avatar"/><!--///[yii2-adminlte-asset]userAvatar-->
            </div>
            <div class="pull-left info">
                <p>
                    <?= \Yii::$app->user->identity->username ?><!--///[yii2-adminlte-asset]username-->
                </p>
            </div>
        </div>

        <!--///[yii2-adminlte-asset]menu-->
        <?php
        $callback = function($menu){ 
            $data = json_decode($menu['data'], true); 
            $items = $menu['children']; 
            $return = [ 
                'label' => $menu['name'], 
                'url' => $menu['route'], 
            ]; 

            if ($data) { 
                isset($data['visible']) && $return['visible'] = $data['visible']; 
                isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon']; 
                $return['options'] = $data; 
            } 

            (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'fa fa-circle-o'; 
            $items && $return['items'] = $items; 
            return $return; 
        }; 

        echo Menu::widget( [ 
            'options' => ['class' => 'sidebar-menu'], 
            'items' => MenuHelper::getAssignedMenu(\Yii::$app->user->id, null, $callback), 
        ] );
        ?>
        <!--///[http://www.brainbook.cc]-->

    </section>

</aside>
