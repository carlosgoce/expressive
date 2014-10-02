Expressive
==========
Adds syntactical sugar to your conditional checks.

[![Build Status](https://travis-ci.org/carlosgoce/expressive.svg?branch=master)](https://travis-ci.org/carlosgoce/expressive)

## use CarlosGoce\Expressive\Is
```php
Is::true($condition);
Is::false($condition);
Is::inArray($needle, array $haystack);
Is::file($file);
```

## use CarlosGoce\Expressive\Raise
```php
Raise::ifTrue($condition, \Exception $exception);
Raise::ifFalse($condition, \Exception $exception);
```