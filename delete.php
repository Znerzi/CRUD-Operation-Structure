<?php
include 'db.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM applicants WHERE id = $id";

    if ($conn->query($sql)) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>