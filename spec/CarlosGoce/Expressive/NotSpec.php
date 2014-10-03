<?php

namespace spec\CarlosGoce\Expressive;

use CarlosGoce\Expressive\Not;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class IsSpec
 * @package spec\CarlosGoce\Expressive
 * @mixin Not
 */
class NotSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CarlosGoce\Expressive\Not');
    }

    function it_can_check_if_true()
    {
        $this->true(true)->shouldReturn(false);
        $this->true(false)->shouldReturn(true);
        $this->true(1)->shouldReturn(true);
        $this->true('1')->shouldReturn(true);
    }

    function it_can_check_if_false()
    {
        $this->false(false)->shouldReturn(false);
        $this->false(true)->shouldReturn(true);
        $this->false(0)->shouldReturn(true);
        $this->false('0')->shouldReturn(true);
    }

    function it_checks_if_is_equalTo()
    {
        $this->equalTo('subject', 'subject')->shouldReturn(false);
        $this->equalTo('another', 'subject')->shouldReturn(true);
        $this->equalTo(1, 'true')->shouldReturn(true);
    }

    function it_can_check_if_is_like()
    {
        $this->like('subject', 'subject')->shouldReturn(false);
        $this->like('another', 'subject')->shouldReturn(true);
        $this->like('1', true)->shouldReturn(false);
    }

    function it_can_check_if_is_void()
    {
        $this->void('')->shouldReturn(false);
        $this->void('123')->shouldReturn(true);
        $this->void(false)->shouldReturn(false);
    }

    function it_can_check_if_is_null()
    {
        $this->null(null)->shouldReturn(false);
        $this->null('123')->shouldReturn(true);
        $this->null(false)->shouldReturn(true);
    }

    function it_checks_if_is_a_number()
    {
        $this->number(1)->shouldReturn(false);
        $this->number(500.45)->shouldReturn(false);
        $this->number('1')->shouldReturn(true);
        $this->number(true)->shouldReturn(true);
    }

    function it_checks_if_is_like_a_number()
    {
        $this->numeric(1)->shouldReturn(false);
        $this->numeric('1')->shouldReturn(false);
        $this->numeric(true)->shouldReturn(true);
    }

    function it_can_check_if_element_is_in_array()
    {
        $this->inArray(1, [1, 2, 3])->shouldReturn(false);
        $this->inArray(4, [1, 2, 3])->shouldReturn(true);
    }

    function it_checks_existence_of_a_file()
    {
        $this->file(__FILE__)->shouldReturn(false);
        $this->file('unexistent-file')->shouldReturn(true);
    }

}
