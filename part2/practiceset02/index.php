<?php

include 'process.php';

$stopWords = readStopWords();
$text = readInputText();
$sortingOrder = $_POST['sort'] ?? 'desc';
$limit = $_POST['limit'] ?? 10;
$sortedWordFrequency = [];

if (!empty($text)) {
    $words = tokenazation($text);
    $wordFrequency = wordFrequencyCalculator($words, $stopWords);
    $sortedWordFrequency = sortingOption($wordFrequency, $sortingOrder);
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Word Frequency Counter</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="text">Paste your text here:</label><br>
        <textarea id="text" name="text" rows="10" cols="50" required>
            <?php echo htmlspecialchars($text); ?>
        </textarea><br><br>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc" <?php if ($sortingOrder === 'asc') echo 'selected'; ?>>Ascending</option>
            <option value="desc" <?php if ($sortingOrder === 'desc') echo 'selected'; ?>>Descending</option>
        </select><br><br>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="<?php echo $limit; ?>" min="1"><br><br>
        
        <input type="submit" value="Calculate Word Frequency">
    </form>

    <?php if (!empty($text)): ?>

    <div class="resultTable">
        <h2>Result Table</h2>

        <table>
            <tr>
                <th>Word</th>
                <th>Frequency Count</th>
            </tr>
            <?php
            $count = 0;
            foreach ($sortedWordFrequency as $word => $frequency) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($word) . "</td>";
                echo "<td>" . $frequency . "</td>";
                echo "</tr>";
                $count++;
                if ($count >= $limit) {
                    break;
                }
            }
            ?>
        </table>
    </div>

    <?php endif; ?>

</body>
</html>