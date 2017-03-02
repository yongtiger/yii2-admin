<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yongtiger\admin\components\RouteRule;
use yongtiger\admin\components\Configs;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel yongtiger\admin\models\searchs\AuthItem */
/* @var $context yongtiger\admin\controllers\ItemController */
/* @var $this->title string */
/* @var $this->params['breadcrumbs'] array */

$context = $this->context;
$labels = $context->labels();
$this->title = Module::t('message', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="role-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Module::t('message', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => Module::t('message', 'Name'),
            ],
            [
                'attribute' => 'ruleName',
                'label' => Module::t('message', 'Rule Name'),
                'filter' => $rules
            ],
            [
                'attribute' => 'description',
                'label' => Module::t('message', 'Description'),
            ],
            ['class' => 'yii\grid\ActionColumn',],
        ],
    ])
    ?>

</div>
