# Germania KG · CacheServiceProvider

**[Pimple Service Provider](https://pimple.symfony.com/#extending-a-container) for creating [phpFastCache](http://www.phpfastcache.com/) services**

[![Packagist](https://img.shields.io/packagist/v/germania-kg/cacheserviceprovider.svg?style=flat)](https://packagist.org/packages/germania-kg/cacheserviceprovider)
[![PHP version](https://img.shields.io/packagist/php-v/germania-kg/cacheserviceprovider.svg)](https://packagist.org/packages/germania-kg/cacheserviceprovider)
[![Build Status](https://img.shields.io/travis/GermaniaKG/CacheServiceProvider.svg?label=Travis%20CI)](https://travis-ci.org/GermaniaKG/CacheServiceProvider)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/build-status/master)

## Installation with Composer

```bash
$ composer require germania-kg/cacheserviceprovider
```
## Setup

```php
<?php
use Germania\CacheServiceProvider\CacheServiceProvider;

// A. Use with Slim or Pimple
$app = new \Slim\App;
$dic = $app->getContainer();
$dic = new Pimple\Container;

// B. Register Service Provider, 
// Defaults are unsecure!
$csp = new CacheServiceProvider( );
$csp = new CacheServiceProvider( sys_get_tmp_dir(), 3600);

// Pass custom cache directoy and lifetime (seconds)
$csp = new CacheServiceProvider( "path/to/cache", 3600);

// or, leave at defaults: 
$dic->register( $csp  );
```


## Services

### Cache.ItemPool

Returns a *phpFastCache* instance. 

```php
$itempool = $dic['Cache.ItemPool'];
```

## Development

```bash
$ git clone https://github.com/GermaniaKG/CacheServiceProvider.git
$ cd CacheServiceProvider
$ composer install
```

## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. Run [PhpUnit](https://phpunit.de/) test or composer scripts like this:

```bash
$ composer test
# or
$ vendor/bin/phpunit
```
