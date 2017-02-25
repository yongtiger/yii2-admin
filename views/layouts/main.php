<?php ///[yii2-admin release version 1.2.0 (Layout:main, main-login)]

/**
 * @var $this yii\base\View
 * @var $content string
 */

use yii\helpers\Html;

///[yii2-admin release version 1.2.0 (Layout:main, main-login)]register AppAsset in advanced or basic template
if (class_exists('backend\assets\AppAsset')) {
    call_user_func('backend\assets\AppAsset::register', $this);
} else {
    call_user_func('app\assets\AppAsset::register', $this);
}

if ($this->context->action->id === 'login') { 

    echo $this->render(
        'main-login',
        ['content' => $content]
    );
    
} else { ?>

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
    <body>
    
    <?php $this->beginBody() ?>
        <div class="wrap">

            <?= $this->render(
                'header.php'
            ) ?>

            <?= $this->render(
                'content.php',
                ['content' => $content]
            ) ?>

        </div>

        <?= $this->render(
            'footer.php'
        ) ?>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>

<?php } ?>