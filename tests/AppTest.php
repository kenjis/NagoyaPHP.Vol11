<?php

namespace NagoyaPHP\Vol11;

class AppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var App
     */
    protected $obj;

    protected function setUp()
    {
        parent::setUp();
        $this->obj = new App();
    }

    public function testNew()
    {
        $actual = $this->obj;
        $this->assertInstanceOf('\NagoyaPHP\Vol11\App', $actual);
    }

    /**
     * @dataProvider provideInput
     */
    public function testProcess($input, $expected)
    {
        $test = $this->obj->process($input);
        $this->assertEquals($expected, $test);
    }

    public function provideInput()
    {
        return [
            ['5->2', 'mo'],
            ['28->10', 'au'],
            ['1->1', 'me'],
            ['40->40', 'me'],
            ['27->27', 'me'],
            ['7->2', 'mo'],
            ['40->13', 'mo'],
            ['9->3', 'mo'],
            ['4->1', 'mo'],
            ['1->3', 'da'],
            ['12->35', 'da'],
            ['3->8', 'da'],
            ['6->19', 'da'],
            ['38->40', 'si'],
            ['9->8', 'si'],
            ['4->2', 'si'],
            ['15->16', 'si'],
            ['40->12', 'au'],
            ['10->4', 'au'],
            ['21->5', 'au'],
            ['8->2', 'au'],
            ['3->5', 'ni'],
            ['11->39', 'ni'],
            ['2->13', 'ni'],
            ['13->32', 'ni'],
            ['14->22', 'co'],
            ['40->34', 'co'],
            ['5->8', 'co'],
            ['12->10', 'co'],
            ['1->27', '-'],
            ['8->1', '-'],
            ['12->22', '-'],
            ['2->40', '-'],
            ['32->31', '-'],
            ['13->14', '-'],
        ];
    }

    public function testPaserInput()
    {
        $input = '5->2';
        $test = $this->obj->parseInput($input);
        $expected = [5, 2];
        $this->assertEquals($expected, $test);
        
        $input = '38->40';
        $test = $this->obj->parseInput($input);
        $expected = [38, 40];
        $this->assertEquals($expected, $test);
        
        $input = '40->12';
        $test = $this->obj->parseInput($input);
        $expected = [40, 12];
        $this->assertEquals($expected, $test);
    }
}
