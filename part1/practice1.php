<?php

function triangleAreaCalculator($side1, $side2, $side3) {
    $s = ($side1 + $side2 + $side3) / 2;
    $area_of_triangle = $s * ($s - $side1) * ($s - $side2) * ($s - $side3);
    $area = sqrt_custom($area_of_triangle);
    return number_format($area, 2);
}

function sqrt_custom($number) {
    if ($number < 0) {
        return 0; 
    }
    $x = $number;
    $y = 1;
    $epsilon = 0.000001; 

    while ($x - $y > $epsilon) {
        $x = ($x + $y) / 2;
        $y = $number / $x;
    }
    return $x;
}

$result = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $side1 = $_POST['side1'];
    $side2 = $_POST['side2'];
    $side3 = $_POST['side3'];

    if (($side1 + $side2 > $side3) && ($side1 + $side3 > $side2) && ($side2 + $side3 > $side1)) {
        $area = triangleAreaCalculator($side1, $side2, $side3);
        $result = "Triangle Area: " . $area;
    } else {
        $result = "Invalid triangle sides. The sum of any two sides must be greater than the third.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Triangle Area Calculator</h2>

    <form action="" method="post">
        <label for="side1">Enter Side 1: </label>
        <input type="number" name="side1" step="0.01" required><br>
        <label for="side2">Enter Side 2: </label>
        <input type="number" name="side2" step="0.01" required><br>
        <label for="side3">Enter Side 3: </label>
        <input type="number" name="side3" step="0.01" required><br><br>

        <button type="submit">Calculate</button>
    </form>

    <?php 
    if ($result) { echo "<p>$result</p>"; } 
    ?> 
</body>
</html>