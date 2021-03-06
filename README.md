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
Is::true($value);
Is::false($value);
Is::equalTo($expected, $value);
Is::like($expected, $value);
Is::void($value);
Is::null($value);
Is::inArray($needle, array $haystack);
Is::number($number);
Is::numeric($number);
Is::file($file);
```


#### CarlosGoce\Expressive\Not
```php
Not::true($value);
Not::false($value);
Not::equalTo($expected, $value);
Not::like($expected, $value);
Not::void($value);
Not::null($value);
Not::inArray($needle, array $haystack);
Not::number($number);
Not::numeric($number);
Not::file($file);
```


#### CarlosGoce\Expressive\Raise
```php
Raise::when($condition, \Exception $exception);
Raise::unless($condition, \Exception $exception);
```

#### CarlosGoce\Expressive\Execute
```php
//Executes a closure and returns its value
Execute::it(\Closure $callback);
Execute::when($condition, \Closure $callback);
Execute::unless($condition, \Closure $callback);
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
Express::not()->file($file);
Express::raise()->unless($condition, \Exception $exception);
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
        Raise::when(Is::null($someValue), new \Exception('Some value is null') );
    }
}

//Using the express facade
use CarlosGoce\Expressive\Facade\Express;

class MyController
{
    public function myMethod()
    {
        //Easier to use and needs only one import but is more verbose
        Express::raise()->when(Express::Is()->null($someValue), new \Exception('Some value is null') );
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
        $this->raise->when($this->is->null($someValue), new \Exception('Some value is null') );
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
        $this->express->raise()->when( $this->express->is()->null($someValue), new \Exception('Some value is null') );
    }
}
```