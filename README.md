# Germania KG · CacheServiceProvider

**[Pimple Service Provider](https://pimple.symfony.com/#extending-a-container) for creating [phpFastCache](http://www.phpfastcache.com/) services**

[![Build Status](https://travis-ci.org/GermaniaKG/CacheServiceProvider.svg?branch=master)](https://travis-ci.org/GermaniaKG/CacheServiceProvider)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/CacheServiceProvider/build-status/master)


## Installation

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

// B. Register Service Provider.
// Optionally pass length and strenth:
$csp = new CacheServiceProvider( "path/to/cache", 3600);

$dic->register( $csp  );
```


## Services

### Cache.ItemPool

Returns a *phpFastCache* instance. 

```php
$itempool = $dic['Cache.ItemPool'];
```


## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. 
Run [PhpUnit](https://phpunit.de/) like this:

```bash
$ vendor/bin/phpunit
```

