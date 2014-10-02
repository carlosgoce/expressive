<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\Express;

class Execute extends Express
{
    static function it(\Closure $callback)
    {
        return $callback();
    }

    static function ifTrue($condition, \Closure $callback)
    {
        if (Is::true($condition)) {
            return $callback();
        }

        return null;
    }

    static function ifFalse($condition, \Closure $callback)
    {
        if (Is::false($condition)) {
            return $callback();
        }

        return null;
    }}