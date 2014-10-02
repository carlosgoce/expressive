<?php

namespace CarlosGoce\Expressive\Facade;

use CarlosGoce\Expressive\Behavior\AllowNonStaticCalls;
use CarlosGoce\Expressive\Execute;
use CarlosGoce\Expressive\Is;
use CarlosGoce\Expressive\Raise;

class Express extends AllowNonStaticCalls {

    protected static $executeInstance;
    protected static $isInstance;
    protected static $raiseInstance;

    /**
     * @return Execute
     */
    static function execute()
    {
        if (self::$executeInstance === null) {
            self::$executeInstance = new Execute();
        }

        return self::$executeInstance;
    }

    /**
     * @return Is
     */
    static function is()
    {
        if (self::$isInstance === null) {
            self::$isInstance = new Is();
        }

        return self::$isInstance;
    }

    /**
     * @return Raise
     */
    static function raise()
    {
        if (self::$raiseInstance === null) {
            self::$raiseInstance = new Raise();
        }

        return self::$raiseInstance;
    }
} 