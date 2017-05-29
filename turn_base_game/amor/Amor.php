<?php

class Amor {
    protected $defense;
    protected $block;

    /**
     * Amor constructor.
     * @param $defense
     * @param $block
     */
    public function __construct($defense, $block) {
        $this->defense = $defense;
        $this->block = $block;
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

}