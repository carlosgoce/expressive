<?php

namespace spec\CarlosGoce\Expressive;

use CarlosGoce\Expressive\Execute;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ExecuteSpec
 * @package spec\CarlosGoce\Expressive
 * @mixin Execute
 */
class ExecuteSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CarlosGoce\Expressive\Execute');
    }

    function it_can_execute_a_closure_and_return_its_value()
    {
        $this->it(function(){
            return true;
        })->shouldReturn(true);
    }

    function it_executes_a_closure_if_condition_is_true()
    {
        $closure = function() {
            return true;
        };

        $this->when(true, $closure)->shouldReturn(true);
        $this->when(false, $closure)->shouldReturn(null);
        $this->unless(true, $closure)->shouldReturn(null);
        $this->unless(false, $closure)->shouldReturn(true);
    }

}
