<?php
include 'db.php';

if (isset($_GET['id'])){
    $id = (int) $_GET['id'];

    $stmt = $conn -> prepare("DELETE FROM applicants WHERE id = ?");
    $stmt -> bind_param("i", $id);

    if ($stmt -> execute()) {
        header("Location: index.php?msg=deleted");
        exit();
    } else {
        die("Error deleting record: " . $stmt -> error);
    }
} else {
    header("Location: index.php");
    exit();
}
?>