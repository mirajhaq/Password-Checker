<?php
require 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Azure Storage account connection details
$connectionString = getenv('AZURE_STORAGE_CONNECTION_STRING');
$blobClient = BlobRestProxy::createBlobService($connectionString);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = $_POST['password'];
    $hashed_password = strtoupper(sha1($password));
    $partition = strtoupper(substr($hashed_password, 0, 3));
    $partition = strtolower($partition);
    $containerName = 'partition-files'; // Name of your container
    $partitionFile = "partitions/$partition.txt"; // Path within the container

    try {
        $blob = $blobClient->getBlob($containerName, $partitionFile);
        $stream = $blob->getContentStream();

        $lines = [];
        while (($line = fgets($stream)) !== false) {
            $lines[] = $line;
        }
        fclose($stream);

        foreach ($lines as $line) {
            list($hashed, $count) = explode(':', $line);
            if (trim($hashed) === $hashed_password) {
                echo '<p class="message">This password has been breached '.(number_format($count)).' times.</p>';
                exit;
            }
        }
        echo '<p class="message">This password has not been breached.</p>';
    } catch (ServiceException $e) {
        echo '<p class="message">An error occurred: '.$e->getMessage().'</p>';
    }
}
?>
