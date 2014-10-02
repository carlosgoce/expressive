<?php

namespace spec\CarlosGoce\Expressive;

use CarlosGoce\Sugarizer\Is;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class IsSpec
 * @package spec\CarlosGoce\Expressive
 * @mixin Is
 */
class IsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CarlosGoce\Expressive\Is');
    }

    function it_can_check_if_true()
    {
        $this->true(true)->shouldReturn(true);
        $this->true(false)->shouldReturn(false);
    }

    function it_can_check_if_false()
    {
        $this->false(false)->shouldReturn(true);
        $this->false(true)->shouldReturn(false);
    }

    function it_can_check_if_element_is_in_array()
    {
        $this->inArray(1, [1, 2, 3])->shouldReturn(true);
        $this->inArray(4, [1, 2, 3])->shouldReturn(false);
    }
}
