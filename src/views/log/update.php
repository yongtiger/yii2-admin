<?php

use yii\helpers\Html;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\admin\models\Log */

$this->title = Module::t('message', 'Update Log') . ': ID ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Log list'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ID ' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>
<div class="log-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
