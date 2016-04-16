<?php
/**
 * This file is part of the NagoyaPHP.Vol11
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Vol11;

use RuntimeException;

class WomanCollection
{
    private $collection = [];

    public function dump()
    {
        var_dump($this->collection);
    }

    public function set(Woman $woman)
    {
        $this->collection[$woman->getId()] = $woman;
    }

    /**
     * @param int $id
     * @return Woman
     */
    public function find($id)
    {
        return $this->collection[$id];
    }

    public function getRelation($a, $b)
    {
        if ($a === $b) {
            return 'me';
        } elseif ($a > $b) {
            $a = $this->find($a);
            $b = $this->find($b);

            $aMother = $a->getParent();
            if ($aMother === $b) {
                return 'mo';
            }

            $aGrandma = $aMother->getParent();
            $bMother = $b->getParent();
            if ($aGrandma === $bMother) {
                return 'au';
            }

            if ($aMother === $bMother) {
                return 'si';
            }

            if ($bMother) {
                $bGrandma = $bMother->getParent();
            } else {
                $bGrandma = null;
            }
            if ($aGrandma === $bGrandma) {
                return 'co';
            }
        } else {
            $a = $this->find($a);
            $b = $this->find($b);

            $bMother = $b->getParent();
            if ($bMother === $a) {
                return 'da';
            }

            $aMother = $a->getParent();
            if ($aMother === $bMother) {
                return 'si';
            }

            $bGrandma = $bMother->getParent();
            if ($aMother === $bGrandma) {
                return 'ni';
            }

            if ($aMother) {
                $aGrandma = $aMother->getParent();
            } else {
                $aGrandma = null;
            }
            if ($aGrandma === $bGrandma) {
                return 'co';
            }
        }

        return '-';
    }
}
