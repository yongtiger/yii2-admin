<?php

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\DetailView;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\admin\models\AuthItem */
/* @var $context yongtiger\admin\controllers\ItemController */
/* @var $this->title string */
/* @var $this->params['breadcrumbs'] array */

$context = $this->context;
$labels = $context->labels();
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('message', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$opts = Json::htmlEncode([
    'items' => $model->getItems(),
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="auth-item-view">
    <h1><?=Html::encode($this->title);?></h1>
    <p>
        <?=Html::a(Module::t('message', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']);?>
        <?=Html::a(Module::t('message', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Module::t('message', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]);?>
        <?=Html::a(Module::t('message', 'Create'), ['create'], ['class' => 'btn btn-success']);?>
    </p>
    <div class="row">
        <div class="col-sm-11">
            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'description:ntext',
                    'ruleName',
                    'data:ntext',
                ],
                'template' => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>',
            ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5">
            <input class="form-control search" data-target="available" placeholder="<?=Module::t('message', 'Search for available');?>">
            <select multiple size="20" class="form-control list" data-target="available"></select>
        </div>
        <div class="col-sm-1">
            <br><br>
            <?=Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->name], [
                'class' => 'btn btn-success btn-assign',
                'data-target' => 'available',
                'title' => Module::t('message', 'Assign'),
            ]);?><br><br>
            <?=Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->name], [
                'class' => 'btn btn-danger btn-assign',
                'data-target' => 'assigned',
                'title' => Module::t('message', 'Remove'),
            ]);?>
        </div>
        <div class="col-sm-5">
            <input class="form-control search" data-target="assigned" placeholder="<?=Module::t('message', 'Search for assigned');?>">
            <select multiple size="20" class="form-control list" data-target="assigned"></select>
        </div>
    </div>
</div>
