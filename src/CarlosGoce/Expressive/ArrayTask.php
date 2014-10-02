<?php

namespace CarlosGoce\Expressive;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;

class ArrayTask extends AllowNonStaticCalls
{
    /**
     * Return the keys of the given array
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
}