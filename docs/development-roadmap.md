# Development roadmap

## 2.7.0 (admin log)


## 2.6.10 (FIX# content.php: call_user_func: 'common/widgets/Alert')


## 2.6.9 (CHG# layouts/footer.php)


## 2.6.8 (FIX# mai-login.php: call_user_func: 'common/widgets/Alert')


## 2.6.7 (CHG# advanced, \yongtiger\application\Application::remoteAppConfigs)


## 2.6.6 (CHG# \common\components\Application)


## 2.6.5 (fix# site-login)


## 2.6.4 (fix# add rule menu)


## 2.6.3 (add settings menu)


## 2.6.2 (view params & i18n)


## 2.6.1 (call_user_func([$alertClassName, 'widget']))


## 2.6.0 (typo)


## 2.5.0 (call_user_func([\Yii::$app->getModule('admin')->alertClassName, 'widget']))


## 2.4.0 (fix# permission_access_bakcend)


## 2.3.0 (fix:main-login.php registerCss(".site-login"))


## 2.2.0 (view params)

```php
'view' => [
    'params' => [
        ///[yii2-admin release version 2.2.0 (view params)]
        'logoutUrl' => ['/site/logout'],
    ],
    // ...
]
```

## 2.1.0 (reconstruction)


## 2.0.0 (reconstruction)


## 1.2.0

Features of this version:

* Layout:main, main-login, content, footer, header


## 1.1.1

Features of this version:

* FIX# admin:return home when guest accesses an invalid route


## 1.1.0

Features of this version:

* FIX# admin:permission_access_backend


## 1.0.0

Features of this version:

* Admin: rbac, menu, defaultRoles
* UPG# [mdmsoft/yii2-admin multi app](https://github.com/mdmsoft/yii2-admin/pull/309/)
  - FIX# Yii debug disappear in route when using mdmsoft/yii2-admin multi app
  - FIX# menu autocomplete when using mdmsoft/yii2-admin multi app
  - FIX# autocomplete parent of creating&updating menu
  - FIX# menu display order
