<?php ///[yii2-admin release version 1.2.0 (Layout:main, main-login)]

/**
 * @var $this yii\base\View
 * @var $content string
 * @var $this->params['alertClassName'] callable
 */

use yii\helpers\Html;

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
<body class="login-page">

<?php $this->beginBody() ?>

	<?= call_user_func([isset($this->params['alertClassName']) ? $this->params['alertClassName'] : 'common\\widgets\\Alert', 'widget']); ?>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
