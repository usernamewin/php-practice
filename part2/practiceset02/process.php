<?php

/**
 * Reads a list of stop words from a file and returns them as an array of lowercase strings
 *
 * The FILE_IGNORE_NEW_LINES flag is used to ensure that newline characters are excluded from the array elements
 * The FILE_SKIP_EMPTY_LINES flag is used to ignore any empty lines in the file
 *
 * @return array An array of lowercase stop words read from the 'stop_words.txt' file
 */

function readStopWords(): array {
    $stopWords = file('stop_words.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map('strtolower', $stopWords);
}

/**
 * Reads the input text from the submitted form
 *
 * @return string The input text, or an empty string if no text was submitted
 */

function readInputText(): string
{
    return ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST['text'] : '';
}

?>