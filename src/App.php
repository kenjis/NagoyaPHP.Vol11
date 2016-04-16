<?php
/**
 * This file is part of the NagoyaPHP.Vol11
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Vol11;

class App
{
    public function setUp()
    {
        $this->collection = new WomanCollection();
        
        $w1 = new Woman(1);
        $this->collection->set($w1);
        
        foreach (range(1, 13) as $i) {
            foreach ([$i*3-1, $i*3, $i*3+1] as $j) {
                $w = new Woman($j);
                $w->setMother($this->collection->find($i));
                $this->collection->set($w);
            }
        }
    }

    public function process($input)
    {
        $this->setUp();
        list($a, $b) = $this->parseInput($input);
        return $this->collection->getRelation($a, $b);
    }

    public function parseInput($input)
    {
        $tmp = explode('->', $input);
        return [
            (int) $tmp[0], (int) $tmp[1]
        ];
    }
}
