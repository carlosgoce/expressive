<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;

class Raise extends AllowNonStaticCalls
{
    static function ifTrue($value, \Exception $exception)
    {
        if (Is::true($value)) {
            throw $exception;
        }
    }

    static function ifFalse($value, \Exception $exception)
    {
        if (Is::false($value)) {
            throw $exception;
        }
    }

    static function unlessTrue($value, \Exception $exception)
    {
        self::ifFalse($value, $exception);
    }

    static function unlessFalse($value, \Exception $exception)
    {
        self::ifTrue($value, $exception);
    }

}
