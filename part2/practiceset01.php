<?php

// Poorly organized and hard-to-read code

/**
 * Calculate the total price of items in a shopping cart
 *
 * Iterates through the given array of items and sums up the prices of all products. Each item in the array must have a 'price' key.
 *
 * @param array $items an array of products, where each product contains a 'price' key.
 * @return float the total_price of all products in the cart.
 */

function calculateTotalPrice(array $items): float
{
    $total_price = 0.0;
    foreach ($items as $item) {
        $total_price += $item['price'];
    }
    return $total_price;
}

$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20]
];

// Display total price
$total = calculateTotalPrice($items);
echo "Total Price: $" . $total;


// Perform a series of string manipulation
$string = "This is a poorly written program with little structure and readability.";


// Remove spaces and convert to lowercase
$string = str_replace(' ', '', $string);
$string = strtolower($string);

// Diplay the modified string
echo "\nModified string: " . $string;

// Check if a number is even or odd
$number = 42;

if ($number % 2 == 0) {
    echo "\nThe number " . $number . " is even.";
}
else {
    echo "\nThe number " . $number . " is odd.";
}

?>