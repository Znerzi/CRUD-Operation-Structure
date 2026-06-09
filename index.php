<?php
include 'db.php';

$message = "";

$msgTypes = [
    'success' => 'Added Successfully',
    'updated' => 'Updated Successfully',
    'deleted' => 'Deleted Successfully'
];

if (isset($_GET['msg']) && isset($msgTypes[$_GET['msg']])) {
    $message = "<p class='success'>{$msgTypes[$_GET['msg']]}</p>";
}

$result = $conn -> query("SELECT * FROM applicants");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Applicant Management</title>
</head>
<body>
    <div class="container">
        <h1>Applicant Management</h1>

        <?php echo $message; ?>

        <a href="create.php" class="btn btn-add">+ Add Applicant</a>

        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>

            <?php if ($result -> num_rows > 0): ?>
                <?php while ($row = $result -> fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id']?></td>
                        <td><?= $row['name']?></td>
                        <td><?= $row['location']?></td>
                        <td><?= $row['position']?></td>

                        <td>
                            <a href="read.php?id=<?= $row['id']?>" class="btn btn-add">View</a>
                            <a href="update.php?id=<?= $row['id']?>" class="btn btn-edit">Update</a>
                            <a href="delete.php?id=<?= $row['id']?>" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>

<?php $conn -> close(); ?>