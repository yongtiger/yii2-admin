<?php

use yii\helpers\Html;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\admin\models\AdminLog */

$this->title = Module::t('message', 'Create Log');
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Log List'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
