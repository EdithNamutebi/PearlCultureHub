<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "pearl_cultural_hub";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    echo "❌ Connection failed: " . mysqli_connect_error();
} else {
    echo "✅ Connected successfully to the database!";
    
    // Check if users table exists
    $table_check = mysqli_query($conn, "SHOW TABLES LIKE 'users'");
    if (mysqli_num_rows($table_check) > 0) {
        echo " ✅ 'users' table exists!";
    } else {
        echo " ⚠️ 'users' table does not exist. Run your SQL script.";
    }
    
    mysqli_close($conn);
}
?>