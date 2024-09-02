<?php

$stats = $_POST['stats'];
$userName = preg_replace("/[^a-zA-Z0-9]+/", "", $_POST['userName'] ?? 'Anonymous');
$timestamp = time(); 
$date = date('Y-m-d');

$fileName = "{$userName}_{$date}";
$directoryPath = "/var/tmp"; // Define the directory path
$filePath = "{$directoryPath}/stats_{$fileName}.txt";


// Check if stats are provided
if (empty($stats)) {
    echo 'No stats received';
    exit;
}

// Check if the specified directory exists
if (!file_exists($directoryPath)) {
    echo "<p class='message'>Directory '{$directoryPath}' does not exist, unable to save stats.</p>";
    exit; // Exit the script if the directory doesn't exist
}


// Save the stats file
file_put_contents($filePath, $stats);

echo "<p class='message'>Stats saved successfully at {$filePath}</p>";


?>

