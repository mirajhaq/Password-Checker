<?php
require 'vendor/autoload.php';

use MicrosoftAzure\Storage\Blob\BlobRestProxy;
use MicrosoftAzure\Storage\Common\Exceptions\ServiceException;

// Azure Storage account connection details
$connectionString = getenv('AZURE_STORAGE_CONNECTION_STRING');
$blobClient = BlobRestProxy::createBlobService($connectionString);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['passwordFile'])) {
    $partition_directory = "E:\\Parsed\\partitions";
    $csvFile = $_FILES['passwordFile']['tmp_name'];
    $fileHandle = fopen($csvFile, 'r');
    fgetcsv($fileHandle); // Skip the header row

    echo '<table class="results">';
    echo '<tr><th class="normal-first-col">No.</th><th>Account</th><th>Login Name</th><th>Status</th></tr>'; // Table Header

    $rowCounter = 1; // Initialize row counter

    while (($data = fgetcsv($fileHandle, 1000, ",")) !== FALSE) {
        $password = $data[2];
        $hashed_password = strtoupper(sha1($password));
        $partition = strtoupper(substr($hashed_password, 0, 3));
        $partition = strtolower($partition);
        $partition_file = "$partition_directory/$partition.txt";

        echo '<tr>';
        echo '<td class="normal-first-col">' . $rowCounter . '</td>';
        echo '<td>' . htmlspecialchars($data[0]) . '</td>';
        echo '<td>' . htmlspecialchars($data[1]) . '</td>';

        if (file_exists($partition_file)) {
            $lines = file($partition_file);
            $breached = false;
            foreach ($lines as $line) {
                list($hashed, $count) = explode(':', $line);
                if (trim($hashed) === $hashed_password) {
                    echo '<td>Password has been breached ' . htmlspecialchars(number_format($count)) . ' times.</td>';
                    $breached = true;
                    break;
                }
            }
            if (!$breached) {
                echo '<td>Password has not been breached.</td>';
            }
        } else {
            echo '<td>Partition file not found.</td>';
        }
        echo '</tr>';

        $rowCounter++;
    }
    echo '</table>';

    fclose($fileHandle);
}
?>

