Expressive
==========
Adds syntactical sugar to your conditional checks.

[![Build Status](https://travis-ci.org/carlosgoce/expressive.svg?branch=master)](https://travis-ci.org/carlosgoce/expressive)

### Notes
- Like methods use == comparison instead of ===
- You can make your method call in static or non static way

## use CarlosGoce\Expressive\Is
```php
//Conditionals
Is::true($condition);
Is::false($condition);
Is::like($condition);
Is::notLike($condition);
Is::void($condition);
Is::notVoid($condition);
Is::null($condition);
Is::notNull($condition);

//Arrays
Is::inArray($needle, array $haystack);

//Numbers
Is::number($number);
Is::notNumber($number);
Is::numeric($number);
Is::notNumeric($number);

//Others
Is::file($file);
```

## use CarlosGoce\Expressive\Raise
```php
Raise::ifTrue($condition, \Exception $exception);
Raise::ifFalse($condition, \Exception $exception);
Raise::unlessTrue($condition, \Exception $exception);
Raise::unlessFalse($condition, \Exception $exception);
```
