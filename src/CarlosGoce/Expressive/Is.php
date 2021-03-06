<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;

class Is extends AllowNonStaticCalls
{
    static function true($value)
    {
        return $value === true;
    }

    static function false($value)
    {
        return $value === false;
    }

    static function equalTo($expected, $value)
    {
        return $expected === $value;
    }

    static function like($expected, $value)
    {
        return $expected == $value;
    }

    static function void($value)
    {
        return empty($value);
    }

    static function null($value)
    {
        return is_null($value);
    }

    static function number($number)
    {
        return is_int($number) || is_float($number);
    }

    static function numeric($number)
    {
        return is_numeric($number);
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
