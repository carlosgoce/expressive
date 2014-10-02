Expressive
==========
Adds syntactical sugar to your conditional checks, arrays and more.

[![Build Status](https://travis-ci.org/carlosgoce/expressive.svg?branch=master)](https://travis-ci.org/carlosgoce/expressive)

## Notes
- Like methods use == comparison instead of ===
- You can make your method call in static or non static way
- If a method is not found an UndefinedMethodException will be throwed

#### CarlosGoce\Expressive\Is
```php
//Conditionals
Is::true($value);
Is::false($value);
Is::equalTo($expected, $value);
Is::notEqualTo($expected, $value);
Is::like($expected, $value);
Is::notLike($expected, $value);
Is::void($value);
Is::notVoid($value);
Is::null($value);
Is::notNull($value);

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

#### CarlosGoce\Expressive\Raise
```php
Raise::ifTrue($condition, \Exception $exception);
Raise::ifFalse($condition, \Exception $exception);
Raise::unlessTrue($condition, \Exception $exception);
Raise::unlessFalse($condition, \Exception $exception);
```

#### CarlosGoce\Expressive\Execute
```php
//Executes a closure and returns its value
Execute::it(\Closure $callback);
Execute::ifTrue($value, \Closure $callback);
Execute::ifFalse($value, \Closure $callback);
```

#### CarlosGoce\Expressive\ArrayTask
```php
ArrayTask::changeKeysCase(array $array, $case = CASE_LOWER);
ArrayTask::count(array $array);
ArrayTask::filter(array $array, \Closure $callback = null);
ArrayTask::keys(array $array);
ArrayTask::pluck(array $array, $key)
ArrayTask::size(array $array); //alias of count
ArrayTask::shuffle(array $array);
ArrayTask::values(array $array);
ArrayTask::walk(array $array, \Closure $function);
ArrayTask::merge(array $arrays);
ArrayTask::reverse(array $array, $preserveKeys = false);
```

#### Express Facade
You can also use the express facade so you won't need to import all
the classes. You can use it in a static way or as non static
to easier mocking.

Examples:
```php
Express::execute()->it($closure);
Express::is()->file($file);
Express::raise()->unlessTrue($condition, \Exception $exception);
Express::arrayTask()->keys($array);
```

## Usage
Some real world examples:
```php
//As static class
use CarlosGoce\Expressive\Is;
use CarlosGoce\Expressive\Raise;

class MyController
{
    public function myMethod()
    {
        //Easier to use
        Raise::unlessFalse(Is::null($someValue), new \Exception('Some value is null') );
    }
}

//Using the express facade
use CarlosGoce\Expressive\Facade\Express;

class MyController
{
    public function myMethod()
    {
        //Easier to use and needs only one import but is more verbose
        Express::raise()->unlessFalse(Express::Is()->null($someValue), new \Exception('Some value is null') );
    }
}

//As non static class injected with IOC
use CarlosGoce\Expressive\Is;
use CarlosGoce\Expressive\Raise;

class MyController
{
    protected $raise;
    protected $is;

    public function __construct(Raise $raise, Is $is)
    {
        $this->raise = $raise;
        $this->is = $is;
    }

    public function myMethod()
    {
        //Easier to test
        $this->raise->unlessFalse($this->is->null($someValue), new \Exception('Some value is null') );
    }
}

//With the Express facade
use CarlosGoce\Expressive\Facade\Express;

class MyController
{
    protected $express;

    public function __construct(Express $express)
    {
        $this->express = $express;
    }

    public function myMethod()
    {
        //easier to test and use less imports but is more verbose
        $this->express->raise()->unlessFalse( $this->express->is()->null($someValue), new \Exception('Some value is null') );
    }
}
```