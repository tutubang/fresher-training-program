<?php
include_once "Unit.php";

class Knight extends Unit {
    public function knight_dressed(Dark_armor $dark_armor, Dragon_blade $dragon_blade) {
        $this->defense += $dark_armor->getDefense();
        $this->damage += $dragon_blade->getDamage();
        $this->critical = $dragon_blade->getCritical();
        $this->block = $dark_armor->getBlock();
        $array = array(
            'health'   => $this->health,
            'damage'   => $this->damage,
            'defense'  => $this->defense,
            'critical' => $this->critical,
            'block'    => $this->block,
        );
        return $array;
    }

    public function damage_calculation(Knight $knight, Dragon_blade $dragon_blade) {
        $total_damage = $knight->getDamage() + $dragon_blade->getDamage();
        if ($dragon_blade->isCritical($dragon_blade->getCritical()) == TRUE) {
            return $total_damage * 2;
        } else {
            return $total_damage;
        }
    }
}