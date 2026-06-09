<?php 
$conn = new mysqli("localhost", "root", "", "applicants_db");

if ($conn -> connect_error) {
    ("Connection failed: " . $conn -> connect_error);
}
?>