<?php

namespace CarlosGoce\Expressive;

class Is
{
    function __call($name, $arguments)
    {
        return self::$name($arguments);
    }

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
}
