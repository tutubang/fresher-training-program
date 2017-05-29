<?php

class Weapon {
    protected $damage;
    protected $critical;

    /**
     * Weapon constructor.
     * @param $damage
     * @param $critical
     */
    public function __construct($damage, $critical) {
        $this->damage = $damage;
        $this->critical = $critical;
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
    public function getCritical() {
        return $this->critical;
    }

    /**
     * @param mixed $critical
     */
    public function setCritical($critical) {
        $this->critical = $critical;
    }

    public function isCritical($critical) {
        if (rand(1, 100) < $critical) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}