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

            if ($a->isMother($b)) {
                return 'mo';
            }

            if ($a->isAunt($b)) {
                return 'au';
            }

            if ($a->isSister($b)) {
                return 'si';
            }

            if ($a->isCousin($b)) {
                return 'co';
            }
        } else {
            $a = $this->find($a);
            $b = $this->find($b);

            if ($a->isDaughter($b)) {
                return 'da';
            }

            if ($a->isSister($b)) {
                return 'si';
            }

            if ($a->isNiece($b)) {
                return 'ni';
            }

            if ($a->isCousin($b)) {
                return 'co';
            }
        }

        return '-';
    }
}
