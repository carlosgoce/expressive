<?php

namespace spec\CarlosGoce\Expressive;

use CarlosGoce\Expressive\ArrayTask;
use CarlosGoce\Expressive\Is;
use CarlosGoce\Expressive\Not;
use PhpSpec\Exception\Exception;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class ArrayTaskSpec
 * @package spec\CarlosGoce\Expressive
 * @mixin ArrayTask
 */
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

    function it_can_change_array_keys_case()
    {
        $this->changeKeysCase(['HELLO' => 1, 'WoRld' => 2])->shouldReturn(['hello' => 1, 'world' => 2]);
        $this->changeKeysCase(['HELLO' => 1, 'WoRld' => 2], CASE_LOWER)->shouldReturn(['hello' => 1, 'world' => 2]);
        $this->changeKeysCase(['HELLO' => 1, 'WoRld' => 2], CASE_UPPER)->shouldReturn(['HELLO' => 1, 'WORLD' => 2]);
    }

    function it_can_get_array_values()
    {
        $this->values(['hello' => 1, 'world' => 2])->shouldReturn([1, 2]);
    }

    function it_can_count_array_elements()
    {
        $this->count([])->shouldReturn(0);
        $this->count([1, 2, 3])->shouldReturn(3);
        $this->size([1,2,3,4,5])->shouldReturn(5);
    }

    function it_can_shuffle_elements_of_an_array()
    {
        $array  = range(0, 50);
        $values = array_values($array);

        $result = $this->shuffle($array)->getWrappedObject();

        if ($values === $result) {
            throw new Exception('Array was not shuffled');
        }

        foreach ($values as $value) {
            if ( ! in_array($value, $result)) {
                throw new Exception('Value not found in the new array: ' . $value);
            }
        }
    }

    function it_can_pluck_values_by_key_from_an_array()
    {
        $array = [
            ['id' => 1, 'code' => 100],
            ['id' => 2, 'code' => 200],
            ['id' => 3, 'code' => 300],
        ];

        $this->pluck($array, 'code')->shouldReturn([100, 200, 300]);
        $this->pluck($array, 'id')->shouldReturn([1, 2, 3]);
    }

    function it_can_walk_throught_an_array_modifying_its_values()
    {
        $array = [1,2,3];

        $array = $this->walk($array, function(&$value, $key) {
            $value += 10;
        });

        if (Not::equalTo([11,12,13], $array->getWrappedObject())) {
            throw new \Exception();
        }
    }

    function it_can_filter_arrays()
    {
        $this->filter([1,0,3])->shouldReturn([0 => 1, 2 => 3]);
        $this->filter([1,2,3], function($element) {
            return $element !== 2;
        })->shouldReturn([0 => 1, 2 => 3]);
    }

    function it_can_merge_arrays()
    {
        $this->merge([1], [2])->shouldBe([1, 2]);
        $this->merge([1,2,3], [4,5,6], [7,8,9])->shouldBeLike([1,2,3,4,5,6,7,8,9]);
    }

    function it_can_reverse_arrays()
    {
        $this->reverse([1,2,3])->shouldReturn([3,2,1]);
        $this->reverse([1])->shouldReturn([1]);
    }
}
