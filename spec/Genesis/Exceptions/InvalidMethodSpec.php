<?php

namespace spec\Genesis\Exceptions;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class InvalidMethodSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Genesis\Exceptions\InvalidMethod');
    }
}
