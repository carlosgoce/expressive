<?php

namespace spec\CarlosGoce\Expressive;

use CarlosGoce\Expressive\Raise;
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

    function it_can_throw_exceptions_if_condition_is_true()
    {
        $this->shouldThrow(new \PhpSpec\Exception\Exception())->duringWhen(true, new \PhpSpec\Exception\Exception);
        $this->shouldThrow(new \Exception())->duringWhen(true, new \Exception);
        $this->when(false, new \Exception());
    }

    function it_can_throw_exceptions_checking_if_false()
    {
        $this->shouldThrow(new \PhpSpec\Exception\Exception())->duringUnless(false, new \PhpSpec\Exception\Exception);
        $this->shouldThrow(new \Exception())->duringUnless(false, new \Exception);
        $this->unless(true, new \Exception());
    }

}
