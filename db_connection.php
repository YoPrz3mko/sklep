<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "militaryshop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character set to UTF-8
mysqli_set_charset($conn, "utf8");
?>