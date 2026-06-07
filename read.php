<?php
include 'db.php';

$id = $_GET['id'];
$row = $conn->query("SELECT * FROM applicants WHERE id=$id")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>View</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Applicant Details</h2>

    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $row['id']; ?></td>
        </tr>
        <tr>
            <th>Name</th>
            <td><?= $row['name']; ?></td>
        </tr>
        <tr>
            <th>Location</th>
            <td><?= $row['location']; ?></td>
        </tr>
        <tr>
            <th>Position</th>
            <td><?= $row['position']; ?></td>
        </tr>
    </table>

    <a href="index.php" class="btn btn-cancel">Back</a>
</div>

</body>
</html>

<?php $conn->close(); ?>