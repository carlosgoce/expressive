<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;
use CarlosGoce\Expressive\Exception\UndefinedMethodException;

class Not extends AllowNonStaticCalls
{
    static function true($value)
    {
        return ! Is::true($value);
    }

    static function false($value)
    {
        return ! Is::false($value);
    }

    static function equalTo($expected, $value)
    {
        return $expected !== $value;
    }

    static function like($expected, $value)
    {
        return $expected != $value;
    }

    static function void($value)
    {
        return ! empty($value);
    }

    static function null($value)
    {
        return ! is_null($value);
    }

    static function number($number)
    {
        return ! Is::number($number);
    }

    static function numeric($number)
    {
        return ! is_numeric($number);
    }

    static function inArray($needle, array $haystack)
    {
        return ! in_array($needle, $haystack);
    }

    static function file($file)
    {
        return ! is_file($file);
    }
} 