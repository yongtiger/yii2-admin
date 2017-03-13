<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yongtiger\admin\Module;

/* @var $this yii\web\View */
/* @var $model yongtiger\admin\models\Menu */
/* @var $this->title string */
/* @var $this->params['breadcrumbs'] array */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Module::t('message', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Module::t('message', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Module::t('message', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Module::t('message', 'Are you sure to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'menuParent.name:text:Parent',
            'name',
            'route',
            'order',
        ],
    ])
    ?>

</div>
