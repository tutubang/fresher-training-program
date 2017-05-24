<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php
require 'Circle.php';
    if (isset($_POST['btnSubmit']))
    {
        $radius = $_POST['radius'];
        $circle = new Circle($radius);
        if (is_numeric($radius))
        {
            $area = $circle->areaCircle($radius);
            $perimeter = $circle->perimeterCircle($radius);
        }
    }
?>
    <form method="POST" action="">
        <label>Nhap ban kinh: </label><br>
        <input type="number" name="radius">
        <input type="submit" name="btnSubmit" value="Ket qua"><br>
        <label>Dien tich hinh tron la: </label>
        <input readonly="true" type="number" name="area" value="<?php if (isset($_POST['radius'])) echo $area?>"><br>
        <label>Chu vi hinh tron la: </label>
        <input readonly="true" type="number" name="perimeter" value="<?php if (isset($_POST['radius'])) echo $perimeter?>">
    </form>
</body>
</html>