<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\Express;

class Raise extends Express
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

}
