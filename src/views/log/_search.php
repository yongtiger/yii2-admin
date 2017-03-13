<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\admin\models\searchs\Log */
/* @var $form yii\widgets\ActiveForm */

?>
<div class="log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'route') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Module::t('message', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Module::t('message', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
