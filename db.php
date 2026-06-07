<?php
// Database Connection File
// This file connects to the MySQL database

$servername = "localhost";
$username = "root";
$password = "";  // Default XAMPP password is empty
$dbname = "applicants_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection failed
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connection successful
?>
