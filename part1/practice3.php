<?php

$matrix = [
    [12, 23, 34],
    [45, 55, 62],
    [71, 84, 90]
];

echo "<h2>List of Even Numbers from the Matrix</h2>";
echo "<ul>";

$i = 0;
while ($i < count($matrix)) {

    $x = 0;
    while ($x < count($matrix[$i])) {
        if ($matrix[$i][$x] % 2 == 0) {
            echo "<li>{$matrix[$i][$x]}</li>";
        }
        $x++;
    }
    $i++;
}

echo "</ul>";

?>