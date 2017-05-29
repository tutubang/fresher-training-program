<?php
include_once 'Unit.php';

class Soldier extends Unit {

    public function soldier_dressed(Chain_mail $chain_mail, Excalibur $excalibur) {
        $this->defense += $chain_mail->getDefense();
        $this->damage += $excalibur->getDamage();
        $this->critical = $excalibur->getCritical();
        $this->block = $chain_mail->getBlock();
        $array = array(
            'health'   => $this->health,
            'damage'   => $this->damage,
            'defense'  => $this->defense,
            'critical' => $this->critical,
            'block'    => $this->block,
        );
        return $array;
    }

    public function damage_calculation(Soldier $soldier, Excalibur $excalibur) {
        $total_damage = $soldier->getDamage() + $excalibur->getDamage();
        if ($excalibur->isCritical(20) == true) {
            return $total_damage =$total_damage * 2;
        } else {
            return $total_damage;
        }
    }

}