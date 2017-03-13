<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yongtiger\admin\Module;

/**
 * @var yii\web\View $this
 * @var yongtiger\admin\models\AuthItem $model
 * @var $this->title string
 * @var $this->params['breadcrumbs'] array
 */

$this->title = $model->name;
$this->params['breadcrumbs'][] = [
    'label' => ($this->context->module->defaultUrlLabel ?: Module::t('message', 'RBAC')),
    'url' => ['/' . ($this->context->module->defaultUrl ?: $this->context->module->uniqueId)],
];
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="auth-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('message', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?php
        echo Html::a(Module::t('message', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Module::t('message', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]);
        ?>
    </p>

    <?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'className',
        ],
    ]);
    ?>
</div>
