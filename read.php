<?php 
include 'db.php';

$id = $_GET['id'];

$result = $conn -> query("SELECT * FROM applicants WHERE id = $id");
$row = $result -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>View</title>
</head>
<body>
    <div class="container">
        <h1>Applicant Details</h1>

        <table class="table">
            <tr>
                <th>ID</th>
                <td><?= $row['id'] ?></td>
            </tr>
            
            <tr>
                <th>Name</th>
                <td><?= $row['name'] ?></td>
            </tr>
            
            <tr>
                <th>Location</th>
                <td><?= $row['location'] ?></td>
            </tr>
            
            <tr>
                <th>Position</th>
                <td><?= $row['position'] ?></td>
            </tr>            
        </table>
        <a href="index.php" class="btn btn-cancel">Back</a>
    </div>
</body>
</html>