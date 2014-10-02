<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;

class Raise extends AllowNonStaticCalls
{
    static function ifTrue($condition, \Exception $exception)
    {
        if (Is::true($condition)) {
            throw $exception;
        }
    }

    static function ifFalse($condition, \Exception $exception)
    {
        if (Is::false($condition)) {
            throw $exception;
        }
    }

    static function unlessTrue($condition, \Exception $exception)
    {
        self::ifFalse($condition, $exception);
    }

    static function unlessFalse($condition, \Exception $exception)
    {
        self::ifTrue($condition, $exception);
    }

}
