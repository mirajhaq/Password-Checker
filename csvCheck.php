<?php
require 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Azure Storage account connection details
$connectionString = getenv('AZURE_STORAGE_CONNECTION_STRING');
$blobClient = BlobRestProxy::createBlobService($connectionString);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['passwordFile'])) {
    $csvFile = $_FILES['passwordFile']['tmp_name'];
    $fileHandle = fopen($csvFile, 'r');
    fgetcsv($fileHandle); // Skip the header

    echo '<table class="results">';
    echo '<tr><th class="normal-first-col">No.</th><th>Account</th><th>Login Name</th><th>Status</th></tr>'; // Table Header

    $rowCounter = 1; // Initialize row counter

    while (($data = fgetcsv($fileHandle, 1000, ",")) !== FALSE) {
        $password = $data[2];
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

            $breached = false;
            $status = 'Password has not been breached.';
            foreach ($lines as $line) {
                list($hashed, $count) = explode(':', $line);
                if (trim($hashed) === $hashed_password) {
                    $status = 'Password has been breached ' . htmlspecialchars(number_format($count)) . ' times.';
                    $breached = true;
                    break;
                }
            }
        } catch (ServiceException $e) {
            $status = 'An error occurred: ' . htmlspecialchars($e->getMessage());
        }

        // Output the row with status included
        echo '<tr>';
        echo '<td class="normal-first-col">' . $rowCounter . '</td>';
        echo '<td>' . htmlspecialchars($data[0]) . '</td>';
        echo '<td>' . htmlspecialchars($data[1]) . '</td>';
        echo '<td>' . $status . '</td>';
        echo '</tr>';

        $rowCounter++;
    }
    echo '</table>';

    fclose($fileHandle);
}
?>

