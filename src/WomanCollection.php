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

    /**
     * @param int $a
     * @param int $b
     * @return string
     */
    public function getRelation($a, $b)
    {
        $a = $this->find($a);
        $b = $this->find($b);

        switch (true) {
            case $a === $b:
                return 'me';
                break;
            case $a->isMother($b):
                return 'mo';
                break;
            case $a->isAunt($b):
                return 'au';
                break;
            case $a->isSister($b):
                return 'si';
                break;
            case $a->isCousin($b):
                return 'co';
                break;
            case $a->isDaughter($b):
                return 'da';
                break;
            case $a->isNiece($b):
                return 'ni';
                break;
            default:
                return '-';
        }
    }
}
