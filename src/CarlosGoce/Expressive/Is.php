<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\Express;

class Is extends Express
{
    static function true($condition)
    {
        return $condition === true;
    }

    static function false($condition)
    {
        return $condition === false;
    }

    static function like($condition)
    {
        return $condition == true;
    }

    static function notLike($condition)
    {
        return $condition == false;
    }

    static function inArray($needle, array $haystack)
    {
        return in_array($needle, $haystack);
    }

    static function file($file)
    {
        return is_file($file);
    }
}
