<?php

namespace spec\CarlosGoce\Expressive;

use CarlosGoce\Sugarizer\Raise;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class RaiseSpec
 * @package spec\CarlosGoce\Expressive
 * @mixin Raise
 */
class RaiseSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CarlosGoce\Expressive\Raise');
    }

    function it_can_throw_exceptions_if_condition_is_met()
    {
        $this->shouldThrow(new \PhpSpec\Exception\Exception())->duringIfTrue(true, new \PhpSpec\Exception\Exception);
        $this->shouldThrow(new \Exception())->duringIfTrue(true, new \Exception);
        $this->ifTrue(false, new \Exception());
    }

}
