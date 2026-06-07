<?php
// DELETE - Remove applicant
include 'db.php';

// Get applicant ID from URL
$id = $_GET['id'];

// SQL query to delete applicant
$sql = "DELETE FROM applicants WHERE id = $id";

// Execute query
if ($conn->query($sql) === TRUE) {
    // Redirect to index.php after deletion
    header("Location: index.php?msg=deleted");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
