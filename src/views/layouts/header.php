<?php ///[yii2-admin release version 1.2.0 (Layout:main, main-login)]

/**
 * @var $this yii\base\View
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

?>
<?php
NavBar::begin([
    'brandLabel' => 'My Company',
    'brandUrl' => \Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => 'Home', 'url' => isset($this->params['homeUrl']) ? $this->params['homeUrl'] : ['/site/index']], ///[yii2-admin release version 2.2.0 (view params)]
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Login', 'url' => isset($this->params['loginUrl']) ? $this->params['loginUrl'] : ['/site/login']];   ///[yii2-admin release version 2.2.0 (view params)]
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(isset($this->params['logoutUrl']) ? $this->params['logoutUrl'] : ['/site/logout'], 'post')    ///[yii2-admin release version 2.2.0 (view params)]
        . Html::submitButton(
            'Logout (' . \Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>