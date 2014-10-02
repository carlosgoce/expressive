Expressive
==========
Adds syntactical sugar to your conditional checks.

[![Build Status](https://travis-ci.org/carlosgoce/expressive.svg?branch=master)](https://travis-ci.org/carlosgoce/expressive)

### Notes
· Like methods use == comparison instead of ===

## use CarlosGoce\Expressive\Is
```php
Is::true($condition);
Is::false($condition);
Is::inArray($needle, array $haystack);
Is::file($file);
Is::like($condition);
Is::notLike($condition);
Is::number($number);
Is::notNumber($number);
Is::numeric($number);
Is::notNumeric($number);
```

## use CarlosGoce\Expressive\Raise
```php
Raise::ifTrue($condition, \Exception $exception);
Raise::ifFalse($condition, \Exception $exception);
```