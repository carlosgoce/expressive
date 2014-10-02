Expressive
=========
Adds syntactical sugar to your conditional checks.

## use CarlosGoce\Expressive\Is
```php
Is::true($condition);
Is::false($condition);
```

## use CarlosGoce\Expressive\Raise
```php
Raise::ifTrue($condition, \Exception $exception);
```