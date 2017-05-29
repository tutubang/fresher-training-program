<?php
class Circle
{
    private $radius;

    function setRadius($radius)
    {
        $this->radius = $radius;
    }

    function getRadius()
    {
        return $this->radius;
    }

    function areaCircle($radius)
    {
        $PI = 3.14;
        return $area = $radius*$PI;
    }

    function perimeterCircle($radius) {
        $PI = 3.14;
        return $perimeter = 2 * $PI * $radius;
    }
}
