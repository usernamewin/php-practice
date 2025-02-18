<?php

$fruits = [
    "Rambutan", 
    "Durian", 
    "Soursop", 
    "Pomegranate", 
    "Santol"
];

echo "<h2>List of Fruits</h2>";
echo "<ol>";

for ($i = 0; $i < count($fruits); $i++) {
    echo "<li>{$fruits[$i]}</li>";
}

echo "</ol>";

?>