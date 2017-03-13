<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\admin\models\Log */

$this->title = Module::t('message', 'View Log') . ': ID ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Log List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="log-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('message', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Module::t('message', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('message', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'route',
            'description:ntext',
            'user_id',
            ['attribute' => 'created_at', 'format' => ['datetime', 'php:Y-m-d H:i:s']],
        ],
    ]) ?>

</div>
