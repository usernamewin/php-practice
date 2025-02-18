<?php

// Poorly organized and hard-to-read code

/**
 * Calculate the total price of items in a shopping cart
 *
 * Iterates through the given array of items and sums up the prices of all products.
 * Each item in the array must have a 'price' key.
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

/**
 * Perform a series of string manipulations
 *
 * @param string $string is the string to manipulate.
 * @return string the modified string.
 */

function stringModification(string $string): string
{
// Remove spaces and convert to lowercase
    $string = str_replace(' ', '', $string);
    return strtolower($string);
} 

/**
 * Check if a number is even or odd
 *
 * If the number is even, it returns an indication that it is even.
 * If the number is odd, it returns an indication that it is odd.
 *
 * @param int $number is the given number to check.
 * @return string the result that will tell if the given number is even or odd.
 */

function evenOrOdd(int $number): string
{
    return ($number % 2 == 0) ? "The number $number is even." : "The number $number is odd.";
}


// Display total price
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20]
];

$total = calculateTotalPrice($items);
echo "Total Price: $" . $total . "<br>";


// Diplay the modified string
$string = "This is a poorly written program with little structure and readability.";
$modifiedString = stringModification($string);
echo "Modified string: $modifiedString" . "<br>";


// Display the result, whether the number is even or odd
$number = 42;
$resultEvonOrOdd = evenOrOdd($number);
echo "$resultEvonOrOdd";

// The \n syntax does not work, so "<br>" is used instead

?>