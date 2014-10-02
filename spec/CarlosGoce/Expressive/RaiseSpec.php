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

    function it_can_throw_exceptions_if_condition_is_met()
    {
        $this->shouldThrow(new \PhpSpec\Exception\Exception())->duringIfTrue(true, new \PhpSpec\Exception\Exception);
        $this->shouldThrow(new \Exception())->duringIfTrue(true, new \Exception);
        $this->ifTrue(false, new \Exception());
    }

    function it_can_throw_exceptions_checking_if_false()
    {
        $this->shouldThrow(new \PhpSpec\Exception\Exception())->duringIfFalse(false, new \PhpSpec\Exception\Exception);
        $this->shouldThrow(new \Exception())->duringIfFalse(false, new \Exception);
        $this->ifFalse(true, new \Exception());
    }

    function it_throws_exceptions_unless_true()
    {
        $this->shouldThrow(new \PhpSpec\Exception\Exception())->duringUnlessTrue(false, new \PhpSpec\Exception\Exception);
        $this->shouldThrow(new \Exception())->duringUnlessTrue(false, new \Exception);
        $this->unlessTrue(true, new \Exception());
    }

    function it_throws_exceptions_unless_false()
    {
        $this->shouldThrow(new \PhpSpec\Exception\Exception())->duringUnlessFalse(true, new \PhpSpec\Exception\Exception);
        $this->shouldThrow(new \Exception())->duringUnlessFalse(true, new \Exception);
        $this->unlessFalse(false, new \Exception());
    }

}
