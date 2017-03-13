<?php

use yii\helpers\Html;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\admin\models\AuthItem */
/* @var $context yongtiger\admin\controllers\ItemController */
/* @var $this->title string */
/* @var $this->params['breadcrumbs'] array */

$context = $this->context;
$labels = $context->labels();
$this->title = Module::t('message', 'Update ' . $labels['Item']) . ': ' . $model->name;
$this->params['breadcrumbs'][] = [
    'label' => ($this->context->module->defaultUrlLabel ?: Module::t('message', 'RBAC')),
    'url' => ['/' . ($this->context->module->defaultUrl ?: $this->context->module->uniqueId)],
];
$this->params['breadcrumbs'][] = ['label' => Module::t('message', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Module::t('message', 'Update');
?>
<div class="auth-item-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>
</div>
