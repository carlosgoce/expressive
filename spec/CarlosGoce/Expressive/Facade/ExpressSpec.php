<?php

namespace spec\CarlosGoce\Expressive\Facade;

use CarlosGoce\Expressive\Facade\Express;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ExpressSpec
 * @package spec\CarlosGoce\Expressive\Facade
 * @mixin Express
 */
class ExpressSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CarlosGoce\Expressive\Facade\Express');
    }

    function it_can_get_an_execute_instance()
    {
        $this->execute()->shouldHaveType('CarlosGoce\Expressive\Execute');
    }

    function it_can_get_an_is_instance()
    {
        $this->is()->shouldHaveType('CarlosGoce\Expressive\Is');
    }

    function it_can_get_an_raise_instance()
    {
        $this->raise()->shouldHaveType('CarlosGoce\Expressive\Raise');
    }
}
