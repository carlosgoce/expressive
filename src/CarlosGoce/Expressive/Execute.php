<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\Express;

class Execute extends Express
{
    static function act(\Closure $callback)
    {
        return $callback();
    }
}