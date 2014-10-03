<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;

class Execute extends AllowNonStaticCalls
{
    static function it(\Closure $callback)
    {
        return $callback();
    }

    static function when($condition, \Closure $callback)
    {
        if (Is::true($condition)) {
            return $callback();
        }

        return null;
    }

    static function unless($condition, \Closure $callback)
    {
        if (Is::false($condition)) {
            return $callback();
        }

        return null;
    }}