<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\grid\GridView;
use yongtiger\admin\Module;
use yongtiger\admin\DeleteInAsset;

/* @var $this yii\web\View */
/* @var $searchModel yongtiger\admin\models\searchs\Log */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Module::t('message', 'Log List');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJs('
var delete_in_url = "' . Url::to(['delete-in']) . '";
var delete_in_msg = "' . Module::t('message', 'Are you sure you want to delete? This is a non-recoverable operation!') . '";
', View::POS_HEAD);
DeleteInAsset::register($this);

?>
<div class="log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Module::t('message', 'Create Log'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Module::t('message', 'Batch Delete'), "javascript:void(0);", ['class' => 'btn btn-success gridview']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'options' => ['class' => 'grid-view','style'=>'overflow:auto', 'id' => 'grid'],
        'columns' => [
            ['class' => 'yii\\grid\\SerialColumn'],
            ['class' => 'yii\\grid\\CheckboxColumn', 'name' => 'id'],

            'id',
            'route',
            'description:ntext',
            'user_id',
            ['attribute' => 'created_at', 'format' => ['datetime', 'php:Y-m-d H:i:s']],
            ['class' => 'yii\\grid\\ActionColumn'],
        ],
    ]); ?>
</div>
