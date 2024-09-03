ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$test_file = "\\\\172.16.1.2\\Parsed\\partitions\\test.txt";  // Ensure this file exists on your laptop

if (file_exists($test_file)) {
    echo "File exists and is accessible.";
} else {
    echo "File does not exist or is not accessible.";
}
