<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yongtiger\admin\Module;

/* @var $this  yii\web\View */
/* @var $model yongtiger\admin\models\BizRule */
/* @var $form ActiveForm */

?>
<div class="auth-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 64]) ?>

    <?= $form->field($model, 'className')->textInput() ?>

    <div class="form-group">
        <?php
        echo Html::submitButton($model->isNewRecord ? Module::t('message', 'Create') : Module::t('message', 'Update'), [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])
        ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
