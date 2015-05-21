MATA CMS Product
==========================================

![MATA CMS Module](https://s3-eu-west-1.amazonaws.com/qi-interactive/assets/mata-cms/gear-mata-logo%402x.png)


Product module allows to manage products in MATA CMS.


Installation
------------

- Add the application using composer: 

```json
"matacms/matacms-product": "~1.0.0"
```

Client
------

Product Client extends [`matacms\clients`](https://github.com/qi-interactive/matacms-base/blob/master/clients/SimpleClient.php). 

In addition, it exposes the following methods: 

```php
public function findByURI($uri) {}
```
Returns Product entity with specified URI.

```php
public function findAll() {}
```
Returns all published Product entities using [`caching dependency`](https://github.com/qi-interactive/matacms-cache/blob/master/caching/MataLastUpdatedTimestampDependency.php)

```php
public function getFindAllQuery() {}
```
Returns all published Product entities without caching.


Changelog
---------

## 1.0.0-alpha, May 21, 2015

- Initial release.
