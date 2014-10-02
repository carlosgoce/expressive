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
        $this->act(function(){
            return true;
        })->shouldReturn(true);
    }

}
