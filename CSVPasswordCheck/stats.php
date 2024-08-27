<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['passwordFile'])) {
    $partition_directory = "E:\\Parsed\\partitions";
    $csvFile = $_FILES['passwordFile']['tmp_name'];
    $fileName = $_FILES['passwordFile']['name']; // Original file name
    $fileHandle = fopen($csvFile, 'r');
    fgetcsv($fileHandle); // Skip the header row

    $totalPasswords = 0;
    $breachedCount = 0;
    $hashes = []; // Store password hashes

    while (($row = fgetcsv($fileHandle)) !== FALSE) {
        $totalPasswords++;
        $password = $row[2];
        $hashed_password = strtoupper(sha1($password));

        if (!isset($hashes[$hashed_password])) {
            $hashes[$hashed_password] = 0;
        }
        $hashes[$hashed_password]++;

        $partition = strtolower(substr($hashed_password, 0, 3));
        $partition_file = "$partition_directory\\$partition.txt";

        if (file_exists($partition_file)) {
            $lines = file($partition_file);
            foreach ($lines as $line) {
                list($hashed, $count) = explode(':', trim($line));
                if ($hashed === $hashed_password) {
                    $breachedCount++;
                    break; // Found a match
                }
            }
        }
    }

    fclose($fileHandle);

    // Calculate the number of duplicate groups
    $duplicateGroups = count(array_filter($hashes, function($count) {
        return $count > 1;
    }));

    $breachedPercentage = $totalPasswords > 0 ? ($breachedCount / $totalPasswords) * 100 : 0;

    $stats = [
        'fileName' => $fileName,
        'totalPasswords' => $totalPasswords,
        'breachedCount' => $breachedCount,
        'breachedPercentage' => number_format($breachedPercentage, 2),
        'duplicateGroups' => $duplicateGroups, // Add the number of duplicate groups
    ];

    echo json_encode($stats); // Return the JSON representation of stats
}
?>

