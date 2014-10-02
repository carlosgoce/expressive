<?php

namespace spec\CarlosGoce\Expressive;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ArrayTaskSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CarlosGoce\Expressive\ArrayTask');
    }

    function it_returns_the_keys_of_an_array()
    {
        $this->keys([1,2,3,])->shouldReturn([0,1,2]);
        $this->keys([5 => 1, 'hello' => 2, 'world' => 3])->shouldReturn([5, 'hello', 'world']);
    }
}
