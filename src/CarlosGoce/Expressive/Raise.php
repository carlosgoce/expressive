<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;

class Raise extends AllowNonStaticCalls
{
    static function when($condition, \Exception $exception)
    {
        if (Is::true($condition)) {
            throw $exception;
        }
    }

    static function unless($condition, \Exception $exception)
    {
        self::when(Not::true($condition), $exception);
    }

}
