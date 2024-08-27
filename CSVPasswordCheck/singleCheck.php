<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    $password = $_POST['password'];
    $hashed_password = strtoupper(sha1($password));
    $partition = strtoupper(substr($hashed_password, 0, 3)); 
    $partition_directory = "E:\Parsed\partitions";
    $partition = strtolower($partition);
    $partition_file = "$partition_directory/$partition.txt";
    if (file_exists($partition_file)) {
        $lines = file($partition_file);
        foreach ($lines as $line) {
            list($hashed, $count) = explode(':', $line);
            if (trim($hashed) === $hashed_password) {
                echo '<p class="message">This password has been breached '.(number_format($count)).' times.</p>';
                exit; 
            }
        }
        echo '<p class="message">This password has not been breached.</p>';
    } else {
        echo '<p class="message">Partition file not found.</p>';
    }
}
?>
