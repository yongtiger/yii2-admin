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
$this->title = Module::t('message', 'Create ' . $labels['Item']);
$this->params['breadcrumbs'][] = ['label' => Module::t('message', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?=
    $this->render('_form', [
        'model' => $model,
    ]);
    ?>

</div>
