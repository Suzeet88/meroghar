
<?php 
$con = mysqli_connect('localhost', 'root', '', '');

// Check connection
if (!$con) {
    die("<script>alert('Cannot connect to the database.');</script>");
}

// Create the database if it doesn't exist
$create_db_query = "CREATE DATABASE IF NOT EXISTS meroghar";
if (mysqli_query($con, $create_db_query)) {
    // Switch to the database
    mysqli_select_db($con, 'meroghar');

    // Create the user table if it doesn't exist
    $create_table_query = "
        CREATE TABLE IF NOT EXISTS meroghar_user (
            id INT AUTO_INCREMENT PRIMARY KEY, 
            fullname VARCHAR(100) NOT NULL, 
            username VARCHAR(50) NOT NULL UNIQUE, 
            email VARCHAR(100) NOT NULL UNIQUE, 
            password VARCHAR(255) NOT NULL
        )
    ";
    
    if (!mysqli_query($con, $create_table_query)) {
        die("<script>alert('Table creation failed: " . mysqli_error($con) . "');</script>");
    }
} else {
    die("<script>alert('Database creation failed: " . mysqli_error($con) . "');</script>");
}
?>
