<?php

namespace spec\CarlosGoce\Expressive;

use CarlosGoce\Expressive\Is;
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
        $this->true(1)->shouldReturn(false);
        $this->true('1')->shouldReturn(false);
    }

    function it_can_check_if_false()
    {
        $this->false(false)->shouldReturn(true);
        $this->false(true)->shouldReturn(false);
        $this->false(0)->shouldReturn(false);
        $this->false('0')->shouldReturn(false);
    }

    function it_checks_if_is_equalTo()
    {
        $this->equalTo('subject', 'subject')->shouldReturn(true);
        $this->equalTo('another', 'subject')->shouldReturn(false);
        $this->equalTo(1, 'true')->shouldReturn(false);
    }

    function it_can_check_if_is_like()
    {
        $this->like('subject', 'subject')->shouldReturn(true);
        $this->like('another', 'subject')->shouldReturn(false);
        $this->like('1', true)->shouldReturn(true);
    }

    function it_can_check_if_is_void()
    {
        $this->void('')->shouldReturn(true);
        $this->void('123')->shouldReturn(false);
        $this->void(false)->shouldReturn(true);
    }

    function it_can_check_if_is_null()
    {
        $this->null(null)->shouldReturn(true);
        $this->null('123')->shouldReturn(false);
        $this->null(false)->shouldReturn(false);
    }

    function it_checks_if_is_a_number()
    {
        $this->number(1)->shouldReturn(true);
        $this->number(500.45)->shouldReturn(true);
        $this->number('1')->shouldReturn(false);
        $this->number(true)->shouldReturn(false);
    }

    function it_checks_if_is_like_a_number()
    {
        $this->numeric(1)->shouldReturn(true);
        $this->numeric('1')->shouldReturn(true);
        $this->numeric(true)->shouldReturn(false);
    }

    function it_can_check_if_element_is_in_array()
    {
        $this->inArray(1, [1, 2, 3])->shouldReturn(true);
        $this->inArray(4, [1, 2, 3])->shouldReturn(false);
    }

    function it_checks_existence_of_a_file()
    {
        $this->file(__FILE__)->shouldReturn(true);
        $this->file('unexistent-file')->shouldReturn(false);
    }
}
