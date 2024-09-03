<?php
require 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Azure Storage account connection details
$connectionString = getenv('AZURE_STORAGE_CONNECTION_STRING');
$blobClient = BlobRestProxy::createBlobService($connectionString);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['passwordFile'])) {
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
        $containerName = 'partition-files'; // Name of your container
        $partitionFile = "partitions/$partition.txt"; // Path within the container

        try {
            $blob = $blobClient->getBlob($containerName, $partitionFile);
            $stream = $blob->getContentStream();

            while (($line = fgets($stream)) !== false) {
                list($hashed, $count) = explode(':', trim($line));
                if ($hashed === $hashed_password) {
                    $breachedCount++;
                    break; // Found a match
                }
            }
            fclose($stream);
        } catch (ServiceException $e) {
            // Handle exception if the file or blob does not exist
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


