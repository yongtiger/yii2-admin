<?php ///[yii2-admin release version 2.6.2 (view params & i18n)]

/**
 * @var $this yii\base\View
 * @var $this->params['brandLabel'] string
 * @var $this->params['brandUrl'] string
 * @var $this->params['logoutUrl'] array|string
 */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yongtiger\admin\Module;

?>
<?php
NavBar::begin([
    'brandLabel' => isset(\Yii::$app->params['brandLabel']) ? \Yii::$app->params['brandLabel'] : \Yii::$app->name,
    'brandUrl' => isset(\Yii::$app->params['brandUrl']) ? \Yii::$app->params['brandUrl'] : \Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => Module::t('message', 'Home'), 'url' => \Yii::$app->homeUrl],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Module::t('message', 'Login'), 'url' => \Yii::$app->user->loginUrl];   ///[yii2-admin release version 2.2.0 (view params)]
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(isset($this->params['logoutUrl']) ? $this->params['logoutUrl'] : ['/site/logout'], 'post')    ///[yii2-admin release version 2.2.0 (view params)]
        . Html::submitButton(
            Module::t('message', 'Logout') . ' (' . \Yii::$app->user->identity->username . ')',
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