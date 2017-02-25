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
 * @var $directoryAsset string
 * @var $userAvatar string User's avatar image url
 *
 * Sets the params parameter `userRole` for the current view:
 *
 * ```php
 * public function actionIndex()
 * {
 *     Yii::$app->view->params['userRole'] = 'role_admin';
 * 
 *     return $this->render('index');
 * }
 * ```
 *
 */

use yii\helpers\Html;

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . \Yii::$app->name . '</span>', \Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        <span class="label label-success">4<!--///??????[yii2-adminlte-asset]--></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 4<!--///??????[yii2-adminlte-asset]--> messages</li>
                        <li>
                            <!-- inner menu: contains the actual data --><!--///??????[yii2-adminlte-asset]-->
                            <ul class="menu">
                                <li><!-- start message -->
                                    <a href="#">
                                        <div class="pull-left">
                                            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                                 alt="User Image"/>
                                        </div>
                                        <h4>
                                            Support Team
                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                        </h4>
                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                                </li>
                                <!-- end message -->
                            </ul>
                        </li>
                        <li class="footer"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">10<!--///??????[yii2-adminlte-asset]--></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 10<!--///??????[yii2-adminlte-asset]--> notifications</li>
                        <li>
                            <!-- inner menu: contains the actual data --><!--///??????[yii2-adminlte-asset]-->
                            <ul class="menu">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                        not fit into the page and may cause design problems
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                    </a>
                                </li>

                                <li>
                                    <a href="#">
                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user text-red"></i> You changed your username
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer"><a href="#">View all</a></li>
                    </ul>
                </li>
                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-flag-o"></i>
                        <span class="label label-danger">9<!--///??????[yii2-adminlte-asset]--></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have 9<!--///??????[yii2-adminlte-asset]--> tasks</li>
                        <li>
                            <!-- inner menu: contains the actual data --><!--///??????[yii2-adminlte-asset]-->
                            <ul class="menu">
                                <li><!-- Task item -->
                                    <a href="#">
                                        <h3>
                                            Create a nice theme
                                            <small class="pull-right">40%</small>
                                        </h3>
                                        <div class="progress xs">
                                            <div class="progress-bar progress-bar-green" style="width: 40%"
                                                 role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <span class="sr-only">40% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <!-- end task item -->
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">View all tasks</a>
                        </li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown.less -->

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= isset($this->params['userAvatar']) ? $this->params['userAvatar'] : $directoryAsset . '/img/user2-160x160.jpg' ?>" class="user-image" alt="User Avatar"/><!--///[yii2-adminlte-asset]userAvatar-->
                        <span class="hidden-xs"><?= \Yii::$app->user->identity->username ?><!--///[yii2-adminlte-asset]username--></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= isset($this->params['userAvatar']) ? $this->params['userAvatar'] : $directoryAsset . '/img/user2-160x160.jpg' ?>" class="img-circle" alt="User Avatar"/><!--///[yii2-adminlte-asset]userAvatar-->

                            <p>
                                <?= \Yii::$app->user->identity->username ?><!--///[yii2-adminlte-asset]username-->
                                <?= isset($this->params['userRole']) ? ' - ' . $this->params['userRole'] : '' ?><!--///[yii2-adminlte-asset]userRole-->
                                <small>Member since Nov. 2012<!--///??????[yii2-adminlte-asset]--></small>
                            </p>
                        </li>

                        <!-- Menu Body --><!--///??????[yii2-adminlte-asset]-->
                        <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a><!--///??????[yii2-adminlte-asset]-->
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
