<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;

class ArrayTask extends AllowNonStaticCalls
{
    static function keys(array $array)
    {
        return array_keys($array);
    }
}