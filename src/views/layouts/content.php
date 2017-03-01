<?php ///[yii2-admin release version 1.2.0 (Layout:main, main-login)]

/**
 * @var $this yii\base\View
 * @var $content string
 */

use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;
use yongtiger\admin\components\MenuHelper;

$this->registerCss(<<<CSS
.list-group-item.active a, .list-group-item.active a:hover  {
    background-color: #337AB7;
    color: white;
}
CSS
);

?>

<div class="container">
	<div class="site-index">
	    <div class="col-sm-3">

            <!--///[yii2-admin]menu-->
            <?= Menu::widget( [ 
            	// 'options' => ['class' => 'navbar navbar-default'], 
            	'options' => ['class' => 'list-group'], 
            	'itemOptions' => ['class' => 'list-group-item'], 
                'items' => MenuHelper::getAssignedMenu(\Yii::$app->user->id), 
            ] );
            ?>
            <!--///[http://www.brainbook.cc]-->

	    </div>
	    <div class="col-sm-9">
		    <?= Breadcrumbs::widget([
		        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		    ]) ?>
		    <?= call_user_func([\Yii::$app->getModule('admin')->alertClassName, 'widget']); ?>
		    <?= $content ?>
	    </div>
	</div>
</div>
