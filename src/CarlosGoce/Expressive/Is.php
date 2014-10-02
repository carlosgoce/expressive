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

    static function equalTo($expected, $subject)
    {
        return $expected === $subject;
    }

    static function notEqualTo($expected, $subject)
    {
        return $expected !== $subject;
    }

    static function like($expected, $subject)
    {
        return $expected == $subject;
    }

    static function notLike($expected, $subject)
    {
        return $expected != $subject;
    }

    static function void($condition)
    {
        return empty($condition);
    }

    static function notVoid($condition)
    {
        return ! self::void($condition);
    }

    static function null($condition)
    {
        return is_null($condition);
    }

    static function notNull($condition)
    {
        return ! self::null($condition);
    }

    static function number($number)
    {
        return is_int($number) || is_float($number);
    }

    static function notNumber($number)
    {
        return ! self::number($number);
    }

    static function numeric($number)
    {
        return is_numeric($number);
    }

    static function notNumeric($number)
    {
        return ! is_numeric($number);
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
