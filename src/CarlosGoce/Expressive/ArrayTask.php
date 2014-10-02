<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;

class ArrayTask extends AllowNonStaticCalls
{

    /**
     * @param array $array
     * @return array
     */
    static function keys(array $array)
    {
        return array_keys($array);
    }

    /**
     * Change the keys case
     * @param array $array
     * @param int $case Use php constants: CASE_LOWER or CASE_UPPER
     * @return array
     */
    static function changeKeysCase(array $array, $case = CASE_LOWER)
    {
        return array_change_key_case($array, $case);
    }

    /**
     * @param array $array
     * @return array
     */
    static function values(array $array)
    {
        return array_values($array);
    }

    /**
     * @param array $array
     * @return int
     */
    static function count(array $array)
    {
        return count($array);
    }

    /**
     * Shuffles an array an its keys
     * @param array $array
     * @return array
     */
    static function shuffle(array $array)
    {
        $newArray = [];
        $keys = array_keys($array);

        shuffle($keys);

        foreach($keys as $key) {
            $newArray[$key] = $array[$key];
        }

        return $newArray;
    }

    /**
     * Alias of count
     * @param array $array
     * @return int
     */
    static function size(array $array)
    {
        return self::count($array);
    }

    /**
     * @param array $array
     * @param $key
     * @return array
     */
    static function pluck(array $array, $key)
    {
        $plucked = [];

        array_walk($array, function($row) use (&$plucked, $key) {
            $plucked[] = $row[$key];
        });

        return $plucked;
    }

    /**
     * Returns a new array after running the closure
     * with a value/key arguments. You can use reference on the value to modify it
     * @param array $array
     * @param callable $callback
     * @return array
     */
    static function walk(array $array, \Closure $callback)
    {
        array_walk($array, $callback);

        return $array;
    }

    /**
     * If no callback is given all elements that cast to false
     * will be removed.
     * @param array $array
     * @param callable $callback
     * @return array
     */
    static function filter(array $array, \Closure $callback = null)
    {
        if ($callback === null) {
            return array_filter($array);
        }

        return array_filter($array, $callback);
    }

    /**
     * Merge two or more arrays
     * You can give it more arrays
     * @param array $array1
     * @param array $array2
     * @return array
     */
    static function merge(array $array1, array $array2)
    {
        return call_user_func_array('array_merge', func_get_args());
    }

    /**
     * @param array $array
     * @param bool $preserveKeys
     * @return array
     */
    static function reverse(array $array, $preserveKeys = false)
    {
        if ($preserveKeys === false) {
            $preserveKeys = null;
        }

        return array_reverse($array);
    }
}