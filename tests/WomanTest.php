<?php

namespace NagoyaPHP\Vol11;

class WomanTest extends \PHPUnit_Framework_TestCase
{
    public function testSetParent()
    {
        $obj = new Woman(10);
        $mother = new Woman(10);
        $obj->setMother($mother);
        $test = $obj->getMother();
        $expected = $mother;
        $this->assertEquals($expected, $test);
    }
}
