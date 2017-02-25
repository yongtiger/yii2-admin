<?php ///[yii2-adminlte-asset]

/**
 * Yii2 adminlte asset
 *
 * @link        http://www.brainbook.cc
 * @see         https://github.com/yongtiger/adminlte-asset
 * @author      Tiger Yong <tigeryang.brainbook@outlook.com>
 * @copyright   Copyright (c) 2017 BrainBook.CC
 * @license     http://opensource.org/licenses/MIT
 */

/**
 * @var $this yii\base\View
 * @var $content string
 * @var $this->params['bodyClass'] string Defaults to 'skin-blue sidebar-mini'. The skin class can be one of:    
 *      "skin-blue",
 *      "skin-black",
 *      "skin-red",
 *      "skin-yellow",
 *      "skin-purple",
 *      "skin-green",
 *      "skin-blue-light",
 *      "skin-black-light",
 *      "skin-red-light",
 *      "skin-yellow-light",
 *      "skin-purple-light",
 *      "skin-green-light"
 *
 * Other examplse classes: `fixed`, `sidebar-collapse`, `sidebar-open`, `layout-boxed`, `layout-top-nav`, etc.
 * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
 *
 * Sets the params parameter `bodyClass` for the current view:
 *
 * ```php
 * public function actionIndex()
 * {
 *     Yii::$app->view->params['bodyClass'] = 'skin-blue sidebar-mini';
 * 
 *     return $this->render('index');
 * }
 * ```
 *
 */

use yii\helpers\Html;
use yongtiger\adminlteasset\AdminLteAsset;
use yongtiger\adminlteasset\AdminLtePlugins;

///[yii2-adminlte-asset]register AppAsset in advanced or basic template
if (class_exists('backend\assets\AppAsset')) {
    call_user_func('backend\assets\AppAsset::register', $this);
} else {
    call_user_func('app\assets\AppAsset::register', $this);
}

///[yii2-adminlte-asset]register AdminLteAsset
AdminLteAsset::register($this);

if ($this->context->action->id === 'login') { 

    echo $this->render(
        'main-login',
        ['content' => $content]
    );
    
} else {

    $directoryAsset = \Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>

    <?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?= \Yii::$app->language ?>">
    <head>
        <meta charset="<?= \Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition <?= isset($this->params['bodyClass']) ? $this->params['bodyClass'] : 'skin-blue sidebar-mini'?>"><!--///[yii2-adminlte-asset]bodyClass-->
    
    <?php $this->beginBody() ?>
        <div class="wrapper">

            <?= $this->render(
                'header.php',
                ['directoryAsset' => $directoryAsset]
            ) ?>

            <?= $this->render(
                'left.php',
                ['directoryAsset' => $directoryAsset]
            )
            ?>

            <?= $this->render(
                'content.php',
                ['content' => $content]
            ) ?>

            <?= $this->render(
                'footer.php'
            ) ?>

        </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

<?php } ?>