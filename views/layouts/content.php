<?php ///[yii2-admin release version 1.2.0 (Layout:main, main-login)]

/**
 * Yii2 admin
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/admin
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

/**
 * @var $this yii\base\View
 * @var $content string
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yongtiger\adminlteasset\widgets\Menu;
use yongtiger\admin\components\MenuHelper;

?>

<div class="container">
	<div class="site-index">
	    <div class="col-sm-2">
	        <div id="manager-menu" class="list-group">

	            <!--///[yii2-admin]menu-->
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
	                    isset($data['icon']) && $data['icon'] && $return['icon'] = $data['icon'];	///??????
	                    $return['options'] = $data; 
	                } 

	                (!isset($return['icon']) || !$return['icon']) && $return['icon'] = 'fa fa-circle-o';	///??????
	                $items && $return['items'] = $items; 
	                return $return; 
	            }; 

	            echo Menu::widget( [ 
	                'options' => ['class' => 'sidebar-menu'], 
	                'items' => MenuHelper::getAssignedMenu(\Yii::$app->user->id, null, $callback), 
	            ] );
	            ?>
	            <!--///[http://www.brainbook.cc]-->

	        </div>
	    </div>
	    <div class="col-sm-10">
		    <?= Breadcrumbs::widget([
		        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		    ]) ?>
		    <?= Alert::widget() ?>
		    <?= $content ?>
	    </div>
	</div>
</div>
