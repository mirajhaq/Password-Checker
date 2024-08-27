<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['passwordFile'])) {
    $partition_directory = "E:\\Parsed\\partitions"; // Ensure this path is correct for your environment
    $csvFile = $_FILES['passwordFile']['tmp_name'];
    $fileHandle = fopen($csvFile, 'r');
    fgetcsv($fileHandle); // Skip the header row

    $hashes = [];

    while (($row = fgetcsv($fileHandle)) !== FALSE) {
        $password = $row[2];
        $hashed_password = strtoupper(sha1($password));
        $row[] = $hashed_password; // Append hashed password to row for later use

        if (!isset($hashes[$hashed_password])) {
            $hashes[$hashed_password] = [];
        }
        $hashes[$hashed_password][] = $row;
    }
    fclose($fileHandle);

    $duplicatesFound = false;
    $groupCounter = 1;

    foreach ($hashes as $hash => $rows) {
        if (count($rows) > 1) { // Filter for duplicates
            $duplicatesFound = true;
            echo "<h4>Group " . $groupCounter . "</h4>";
            echo '<table class="results">';
            echo '<tr><th>Account</th><th>Login Name</th><th>Status</th></tr>';

            foreach ($rows as $row) {
                $partition = strtolower(substr($hash, 0, 3));
                $partition_file = "$partition_directory\\$partition.txt";
                $breachStatus = "Password has not been breached."; // Default status

                if (file_exists($partition_file)) {
                    $lines = file($partition_file);
                    foreach ($lines as $line) {
                        list($hashed, $count) = explode(':', $line);
                        if (trim($hashed) === $hash) {
                            $breachStatus = "Password has been breached " . htmlspecialchars(number_format($count)) . " times.";
                            break;
                        }
                    }
                } else {
                    $breachStatus = "Partition file not found.";
                }

                echo '<tr>';
                echo '<td>' . htmlspecialchars($row[0]) . '</td>';
                echo '<td>' . htmlspecialchars($row[1]) . '</td>';
                echo '<td>' . $breachStatus . '</td>';
                echo '</tr>';
            }
            echo '</table><br>'; // Separate tables for readability
            $groupCounter++;
        }
    }

    if (!$duplicatesFound) {
        echo '<p class="message">No reused passwords found.</p>';
        echo '<div><img src="https://i.giphy.com/ekwEeLxb7G4DW44YaK.webp" style="display: block; margin: 10px auto; max-width: 300px; height: auto;"></div>';
    }
}
?>


