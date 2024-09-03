<?php
require 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Azure Storage account connection details
$connectionString = getenv('AZURE_STORAGE_CONNECTION_STRING');
$blobClient = BlobRestProxy::createBlobService($connectionString);

$stats = $_POST['stats'];
$userName = preg_replace("/[^a-zA-Z0-9]+/", "", $_POST['userName'] ?? 'Anonymous');
$timestamp = time();
$date = date('Y-m-d');

$blobContent = $stats; // The content to be saved
$fileName = "stats_{$userName}_{$date}.txt"; // Blob name
$containerName = 'stats-container'; // Name of your container

try {
    // Upload stats to Azure Blob Storage
    $blobClient->createBlockBlob($containerName, $fileName, $blobContent);
    echo "<p class='message'>Stats saved successfully as '{$fileName}' in container '{$containerName}'.</p>";
} catch (ServiceException $e) {
    echo "<p class='message'>An error occurred: " . htmlspecialchars($e->getMessage()) . "</p>";
}
?>

