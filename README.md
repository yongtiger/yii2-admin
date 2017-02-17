# Yii2 admin version 1.0.0

[![Latest Stable Version](https://poser.pugx.org/yongtiger/yii2-admin/v/stable)](https://packagist.org/packages/yongtiger/yii2-admin)
[![Total Downloads](https://poser.pugx.org/yongtiger/yii2-admin/downloads)](https://packagist.org/packages/yongtiger/yii2-admin) 
[![Latest Unstable Version](https://poser.pugx.org/yongtiger/yii2-admin/v/unstable)](https://packagist.org/packages/yongtiger/yii2-admin)
[![License](https://poser.pugx.org/yongtiger/yii2-admin/license)](https://packagist.org/packages/yongtiger/yii2-admin)

GUI manager for RABC (Role Base Access Control) Yii2. Easy to manage authorization of user

## FEATURES

* Admin: rbac, menu, defaultRoles
  - FIX# should return home when guest access an invalid route, but not to show `#404` error
  - FIX# users without `permission_access_backend` should not login backend (`#403` error)
  - FIX# autocomplete parent of creating&updating menu
  - FIX# menu display order


## REQUIREMENTS

* PHP 5.4.0+
* Yii2 2.0.6+
* Yii2 extension(optional but very useful!): [yiisoft/yii2-jui](https://github.com/yiisoft/yii2-jui), [JUI Extension for Yii 2](http://www.yiiframework.com/doc-2.0/ext-jui-index.html)
* UPG# [mdmsoft/yii2-admin multi app](https://github.com/mdmsoft/yii2-admin/pull/309/)
  - FIX# Yii debug disappear in route when using mdmsoft/yii2-admin multi app
  - FIX# menu autocomplete when using mdmsoft/yii2-admin multi app
  - FIX# mdmsoft/yii2-admin multi app


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
- http://www.yiiframework.com/doc-2.0/guide-runtime-handling-errors.html#using-error-actions


## SEE ALSO


## TBD


## LICENSE 
**yii2-admin** is released under the MIT license, see [LICENSE](https://opensource.org/licenses/MIT) file for details.