<?php
/**
 * This file is part of the NagoyaPHP.Vol11
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Vol11;

use RuntimeException;

class Woman
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var Woman
     */
    private $mother;

    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function setMother(Woman $mother)
    {
        $this->mother = $mother;
    }

    /**
     * @return Woman|null
     */
    public function getMother()
    {
        return $this->mother;
    }

    /**
     * @return Woman|null
     */
    public function getGrandma()
    {
        $mother = $this->getMother();
        if ($mother) {
            return $mother->getMother();
        } else {
            return null;
        }
    }

    public function isMother(Woman $woman)
    {
        if ($this->isSame($this->getMother(), $woman)) {
            return true;
        }
        
        return false;
    }

    public function isDaughter(Woman $woman)
    {
        if ($this->isSame($woman->getMother(), $this)) {
            return true;
        }
        
        return false;
    }

    public function isSister(Woman $woman)
    {
        if ($this->isSame($this->getMother(), $woman->getMother())) {
            return true;
        }
        
        return false;
    }

    public function isAunt(Woman $woman)
    {
        if ($this->isSame($this->getGrandma(), $woman->getMother())) {
            return true;
        }
        
        return false;
    }

    public function isCousin(Woman $woman)
    {
        if ($this->isSame($this->getGrandma(), $woman->getGrandma())) {
            return true;
        }
        
        return false;
    }

    public function isNiece(Woman $woman)
    {
        if ($this->isSame($this->getMother(), $woman->getGrandma())) {
            return true;
        }
        
        return false;
    }

    protected function isSame($a, $b)
    {
        if ($a === null) {
            return false;
        }
        
        if ($b === null) {
            return false;
        }
        
        return $a === $b;
    }
}
