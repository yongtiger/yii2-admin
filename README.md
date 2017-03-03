# Yii2 admin release version 2.6.4 (fix# add rule menu)

[![Latest Stable Version](https://poser.pugx.org/yongtiger/yii2-admin/v/stable)](https://packagist.org/packages/yongtiger/yii2-admin)
[![Total Downloads](https://poser.pugx.org/yongtiger/yii2-admin/downloads)](https://packagist.org/packages/yongtiger/yii2-admin) 
[![Latest Unstable Version](https://poser.pugx.org/yongtiger/yii2-admin/v/unstable)](https://packagist.org/packages/yongtiger/yii2-admin)
[![License](https://poser.pugx.org/yongtiger/yii2-admin/license)](https://packagist.org/packages/yongtiger/yii2-admin)

GUI manager for RABC (Role Base Access Control) Yii2. Easy to manage authorization of user


## FEATURES

* Admin: rbac, menu, defaultRoles
* UPG# [mdmsoft/yii2-admin multi app](https://github.com/mdmsoft/yii2-admin/pull/309/)
  - FIX# Yii debug disappear in route when using mdmsoft/yii2-admin multi app
  - FIX# menu autocomplete when using mdmsoft/yii2-admin multi app
  - FIX# autocomplete parent of creating&updating menu
  - FIX# menu display order
  - FIX# admin:permission_access_backend
  - FIX# admin:return home when guest accesses an invalid route
* Layout:main, main-login, content, footer, header


## REQUIREMENTS

* PHP 5.4.0+
* Yii2 2.0.6+
* Yii2 extension: [yiisoft/yii2-jui](https://github.com/yiisoft/yii2-jui), [JUI Extension for Yii 2](http://www.yiiframework.com/doc-2.0/ext-jui-index.html)


## INSTALLATION   

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yongtiger/yii2-admin "*"
```

or add

```json
"yongtiger/yii2-admin": "*"
```

to the require section of your composer.json.


## CONFIGURATION


## USAGES


## NOTES


## DOCUMENTS


## REFERENCES

- https://github.com/mdmsoft/yii2-admin
- https://github.com/mdmsoft/yii2-admin/pull/309/


## SEE ALSO


## TBD


## [Development roadmap](docs/development-roadmap.md)


## LICENSE 
**yii2-admin** is released under the MIT license, see [LICENSE](https://opensource.org/licenses/MIT) file for details.