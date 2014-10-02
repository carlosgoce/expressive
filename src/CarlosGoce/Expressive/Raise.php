<?php

namespace CarlosGoce\Expressive;

class Raise
{
    function __call($name, $arguments)
    {
        return self::$name($arguments);
    }

    public function ifTrue($condition, \Exception $exception)
    {
        if (Is::true($condition)) {
            throw $exception;
        }
    }

}
