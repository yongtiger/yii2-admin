<?php

use yii\helpers\Html;
use yongtiger\admin\Module;

/* @var $this  yii\web\View */
/* @var $model yongtiger\admin\models\BizRule */
/* @var $this->title string */
/* @var $this->params['breadcrumbs'] array */

$this->title = Module::t('message', 'Create Rule');
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Rules'), 'url' => ['index']];
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
