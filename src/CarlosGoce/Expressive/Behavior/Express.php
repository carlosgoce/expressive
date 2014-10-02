<?php

namespace CarlosGoce\Expressive\Behavior;

use CarlosGoce\Expressive\Exception\UndefinedMethodException;

abstract class Express {

    function __call($name, $arguments)
    {
        if (method_exists(get_class($this), $name)) {
            return self::$name($arguments);
        }

        throw new UndefinedMethodException('Method ' . $name . ' does not exist in class ' . get_class($this));
    }

} 