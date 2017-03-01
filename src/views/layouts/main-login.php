<?php ///[yii2-admin release version 1.2.0 (Layout:main, main-login)]

/**
 * @var $this yii\base\View
 * @var $content string
 */

use yii\helpers\Html;

$this->registerCss(".site-login { width: 360px; margin: 7% auto; }");
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

	<?= call_user_func([\Yii::$app->getModule('admin')->alertClassName, 'widget']); ?>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
