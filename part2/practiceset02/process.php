<?php

/**
 * Reads a list of stop words from a file and returns them as an array of lowercase strings.
 *
 * The FILE_IGNORE_NEW_LINES flag is used to ensure that newline characters are excluded from the array elements.
 * The FILE_SKIP_EMPTY_LINES flag is used to ignore any empty lines in the file.
 *
 * @return array An array of lowercase stop words read from the 'stop_words.txt' file.
 */

function readStopWords(): array 
{
    $stopWords = file('stop_words.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map('strtolower', $stopWords);
}

/**
 * Reads the input text from the submitted form.
 *
 * @return string The input text, or an empty string if no text was submitted.
 */

function readInputText(): string
{
    return ($_SERVER["REQUEST_METHOD"] == "POST") ? $_POST['text'] : '';
}

/**
 * Tokenize the given text into an array of words.
 * 
 * Remove punctuations and convert text into lowercase.
 * 
 * The PREG_SPLIT_NO_EMPTY flag is used to prevent empty elements from being included in the array when splitting a string.
 * Ensures that consecutive delimiters do not result in empty strings in the output.
 * 
 * @param string $text The input text to be tokenized.
 * @return array|false An array of words from the input text, or false if the input text is empty or cannot be tokenized.
 */

function tokenazation(string $text): array|false 
{
    return preg_split('/\W+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
}

/**
 * Calculates the frequency of each word in the given array of words, excluding stop words.
 *
 * @param array $words An array of words to be counted.
 * @param array $stopWords An array of stop words not excluded from the count.
 * @return array An array where the keys are the words and the values are their frequencies.
 */

function wordFrequencyCalculator(array $words, array $stopWords): array 
{
    $wordFrequency = array();

    foreach ($words as $word) 
    {
        if (!in_array($word, $stopWords)) {
            $wordFrequency[$word] = isset($wordFrequency[$word]) ? $wordFrequency[$word] + 1 : 1;
        }
    }

    return $wordFrequency;
}

/**
 * Sorts the given associative array of word frequencies in the specified order.
 *
 * @param array $wordFrequency An array where the keys are words and the values are their frequencies.
 * @param string $sortingOrder The order in which to sort the word frequencies, either ascending ordescending.
 * @return array A sorted array where the keys are words and the values are their frequencies.
 */

function sortingOption(array $wordCounts, string $sortingOrder): array
{
    $sortingOrder == 'asc' ? asort($wordCounts) : arsort($wordCounts);
    return $wordCounts;
}

?>