
<?php
// Use port 3308 to match phpMyAdmin
$host = "localhost";
$user = "root";
$password = "";
$database = "pearlculturehub";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Optional: Confirm connection
// echo "Connected successfully";
?> 