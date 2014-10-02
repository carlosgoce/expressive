<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\Express;

class Is extends Express
{
    static function true($condition)
    {
        return ! empty($condition) && $condition === true;
    }

    static function false($condition)
    {
        return ! self::true($condition);
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
