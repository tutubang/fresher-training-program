<?php
class Unit
{
    protected $health;
    protected $damage;
    protected $defense;
    protected $critical;
    protected $block;

    public function __construct($health, $damage, $defense) {
        $this->health = $health;
        $this->damage = $damage;
        $this->defense = $defense;
//        $this->critical = $critical;
//        $this->block = $block;
    }

    /**
     * @return mixed
     */
    public function getCritical() {
        return $this->critical;
    }

    /**
     * @param mixed $critical
     */
    public function setCritical($critical) {
        $this->critical = $critical;
    }

    /**
     * @return mixed
     */
    public function getBlock() {
        return $this->block;
    }

    /**
     * @param mixed $block
     */
    public function setBlock($block) {
        $this->block = $block;
    }

    /**
     * Unit constructor.
     * @param $health
     * @param $damage
     * @param $defense
     */


    /**
     * @return mixed
     */
    public function getHealth() {
        return $this->health;
    }

    /**
     * @param mixed $health
     */
    public function setHealth($health) {
        $this->health = $health;
    }

    /**
     * @return mixed
     */
    public function getDamage() {
        return $this->damage;
    }

    /**
     * @param mixed $damage
     */
    public function setDamage($damage) {
        $this->damage = $damage;
    }

    /**
     * @return mixed
     */
    public function getDefense() {
        return $this->defense;
    }

    /**
     * @param mixed $defense
     */
    public function setDefense($defense) {
        $this->defense = $defense;
    }

}