<?php
include 'db.php';

$message = "";

$msgTypes = [
    'success' => '✓ Added successfully!',
    'updated' => '✓ Updated successfully!',
    'deleted' => '✓ Deleted successfully!'
];

if (isset($_GET['msg']) && isset($msgTypes[$_GET['msg']])) {
    $message = "<p class='success'>{$msgTypes[$_GET['msg']]}</p>";
}

$result = $conn->query("SELECT * FROM applicants");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Applicants Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Applicants Management System</h1>

    <?= $message ?>

    <a href="create.php" class="btn btn-add">+ Add New Applicant</a>

    <table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>

        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['location'] ?></td>
                    <td><?= $row['position'] ?></td>
                    <td>
                        <a href="read.php?id=<?= $row['id'] ?>" class="btn btn-add">View</a>
                        <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-edit">Edit</a>
                        <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-delete">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="empty">No applicants found</td>
            </tr>
        <?php endif; ?>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>