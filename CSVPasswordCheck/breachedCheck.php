<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['passwordFile'])) {
    $partition_directory = "E:\\Parsed\\partitions"; // Ensure double backslashes for Windows paths
    $csvFile = $_FILES['passwordFile']['tmp_name'];
    $fileHandle = fopen($csvFile, 'r');
    fgetcsv($fileHandle); // Skip the header
    $breachedCount = 0;
    $tableRows = '';
    $rowCounter = 1;

    while (($data = fgetcsv($fileHandle, 1000, ",")) !== FALSE) {
        $password = $data[2];
        $hashed_password = strtoupper(sha1($password));
        $partition = strtoupper(substr($hashed_password, 0, 3));
        $partition = strtolower($partition);
        $partition_file = "$partition_directory\\$partition.txt"; // Ensure double backslashes for Windows paths
        if (file_exists($partition_file)) {
            $lines = file($partition_file);
            foreach ($lines as $line) {
                list($hashed, $count) = explode(':', $line);
                if (trim($hashed) === $hashed_password) {
                    // Store the row for potential display
                    $tableRows .= '<tr><td class="breached-first-col">' . $rowCounter . '</td><td>' . htmlspecialchars($data[0]) . '</td><td>' . htmlspecialchars($data[1]) . '</td><td>Password has been breached ' . htmlspecialchars(number_format($count)) . ' times.</td></tr>';
                    $rowCounter++;
                    $breachedCount++;
                    break;
                }
            }
        }
    }
    fclose($fileHandle);

    if ($breachedCount > 0) {
        // Print the table only if there are breached passwords
        echo '<table class="results">';
        echo '<tr><th>No.</th><th>Account</th><th>Login Name</th><th>Status</th></tr>'; // Table Header
        echo $tableRows; // Print all collected rows
        echo '</table>';
    } else {
        // Display message if no breached passwords are found
        echo "<p class='message'>No breached passwords found.</p>";
        echo '<div><img src="https://i.giphy.com/ekwEeLxb7G4DW44YaK.webp" style="display: block; margin: 10px auto; max-width: 300px; height: auto;"></div>';
    }
}
?>

