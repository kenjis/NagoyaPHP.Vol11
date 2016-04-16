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
        
        foreach ([2,3,4] as $i) {
            $w = new Woman($i);
            $w->setParent($w1);
            $this->collection->set($w);
        }
        
        foreach ([5,6,7] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(2));
            $this->collection->set($w);
        }
        
        foreach ([8,9,10] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(3));
            $this->collection->set($w);
        }
        
        foreach ([11,12,13] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(4));
            $this->collection->set($w);
        }
        
        foreach ([14,15,16] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(5));
            $this->collection->set($w);
        }
        
        foreach ([17,18,19] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(6));
            $this->collection->set($w);
        }
        
        foreach ([20,21,22] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(7));
            $this->collection->set($w);
        }
        
        foreach ([23,24,25] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(8));
            $this->collection->set($w);
        }
        
        foreach ([26,27,28] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(9));
            $this->collection->set($w);
        }
        
        foreach ([29,30,31] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(10));
            $this->collection->set($w);
        }
        
        foreach ([32,33,34] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(11));
            $this->collection->set($w);
        }
        
        foreach ([35,36,37] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(12));
            $this->collection->set($w);
        }
        
        foreach ([38,39,40] as $i) {
            $w = new Woman($i);
            $w->setParent($this->collection->find(13));
            $this->collection->set($w);
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
            $tmp[0], $tmp[1]
        ];
    }
}
