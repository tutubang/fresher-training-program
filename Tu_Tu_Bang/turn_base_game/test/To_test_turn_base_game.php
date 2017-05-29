<?php
include '../person/Soldier.php';
include '../person/Knight.php';
include '../amor/Chain_mail.php';
include '../amor/Dark_armor.php';
include '../weapon/Dragon_blade.php';
include '../weapon/Excalibur.php';
$dark_armor = new Dark_armor(30, 10);
$chain_mail = new Chain_mail(40, 12);
$dragon_blade = new Dragon_blade(40, 30);
$excalibur = new Excalibur(30, 20);
$solider = new Soldier(800, 100, 50);
$knight = new Knight(750, 130, 20);

echo '<pre>';
print_r($solider->soldier_dressed($chain_mail, $excalibur));
echo $solider->getCritical();
echo '<pre>';
print_r($knight->knight_dressed($dark_armor, $dragon_blade));
$turn = 0;
$total_health_knight = $knight->getHealth();
$total_health_soldier = $solider->getHealth();
do {
    $turn++;
    $total_damage_soldier = $solider->damage_calculation($solider, $excalibur);
    $total_damage_knight = $knight->damage_calculation($knight, $dragon_blade);
    if (rand(1, 100) <= $solider->getBlock()) {
        echo "Turn $turn: Soldier attacked Knight but his attack has been blocked." . '<br>';
    } else {
        $damage_soldier = $solider->getDamage() + $excalibur->getDamage();
        if ($damage_soldier == $total_damage_soldier) {
            $defense_knight = $knight->getDefense();
            $total_damage_suffered = $total_damage_soldier - $knight->getDefense();
            $total_health_knight -= $total_damage_suffered;
            echo "Turn $turn: Soldier dealt $total_damage_suffered ($total_damage_soldier - $defense_knight) damage to Knight". '<br>';
            echo "Knight has $total_health_knight Health" . '<br>';
            if ($total_health_knight <= 0) {
                echo "Knight is killed" . '<br>';
                break;
            }
        } else {
            $defense_knight = $knight->getDefense();
            $total_damage_suffered = $total_damage_soldier - $knight->getDefense();
            $total_health_knight -= $total_damage_suffered;
            echo "Turn $turn: Soldier dealt a critical hit of $total_damage_suffered ($total_damage_soldier - $defense_knight) damage to Knight." . '<br>';
            echo "Knight has $total_health_knight Health" . '<br>';
            if ($total_health_knight <= 0) {
                echo "Knight is killed" . '<br>';
                break;
            }
        }
    }
    $turn++;
    if (rand(1, 100) <= $knight->getBlock()) {
        echo "Turn $turn: Knight attacked Soldier but his attack has been blocked." . '<br>';
    } else {
        if($knight->getDamage() + $dragon_blade->getDamage() == $total_damage_knight) {
            $defense_soldier = $solider->getDefense();
            $total_damage_suffered = $total_damage_knight - $solider->getDefense();
            $total_health_soldier -= $total_damage_suffered;
            echo "Turn $turn:Knight dealt $total_damage_suffered ($total_damage_knight - $defense_soldier) damage to Soldier". '<br>';
            echo "Soldier has $total_health_soldier Health" . '<br>';
            if ($total_health_soldier <= 0) {
                echo "Soldier is killed" . '<br>';
                break;
            }
        }
        else {
            $defense_soldier = $solider->getDefense();
            $total_damage_suffered = $total_damage_knight - $solider->getDefense();
            $total_health_soldier -= $total_damage_suffered;
            echo "Turn $turn: Knight dealt a critical hit of $total_damage_suffered ($total_damage_knight - $defense_soldier) damage to Soldier." . '<br>';
            echo "Soldier has $total_health_soldier Health" . '<br>';
            if ($total_health_soldier <= 0) {
                echo "Soldier is killed" . '<br>';
                break;
            }
        }
    }
} while ($total_health_soldier > 0 || $total_health_knight > 0);

