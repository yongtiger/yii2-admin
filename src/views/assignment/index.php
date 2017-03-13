<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel yongtiger\admin\models\searchs\Assignment */
/* @var $usernameField string */
/* @var $extraColumns string[] */
/* @var $this->title string */
/* @var $this->params['breadcrumbs'] array */

$this->title = Module::t('message', 'Assignments');
$this->params['breadcrumbs'][] = [
    'label' => ($this->context->module->defaultUrlLabel ?: Module::t('message', 'RBAC')),
    'url' => ['/' . ($this->context->module->defaultUrl ?: $this->context->module->uniqueId)],
];
$this->params['breadcrumbs'][] = $this->title;

$columns = [
    ['class' => 'yii\grid\SerialColumn'],
    $usernameField,
];
if (!empty($extraColumns)) {
    $columns = array_merge($columns, $extraColumns);
}
$columns[] = [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view}'
];

?>
<div class="assignment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>
