<?php
include 'db.php';

$message = "";

$msgTypes = [
    'success' => 'Added Successfully',
    'updated' => 'Updated Successfully',
    'deleted' => 'Deleted Successfully'
];

if (isset($_GET['msg']) && isset($msgTypes[$_GET['msg']])) {
    $message = "<p class='error'>{$msgTypes[$_GET['msg']]}</p>";
}

$search = "";

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string($_GET['search']);

    $sql = "SELECT * FROM applicants 
            WHERE name LIKE '%$search%' 
            OR location LIKE '%$search%' 
            OR position LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM applicants";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
                <th>Name</th>
                <th>Location</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>

            <?php if ($result -> num_rows > 0): ?>
                <?php while ($row = $result -> fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['location'] ?></td>
                        <td><?= $row['position'] ?></td>
                        
                        <td>
                            <a href="read.php?id=<?= $row['id'] ?>" class="btn btn-add">View</a>
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-edit">Update</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-delete">Delete</a>
                        </td>
                    </tr>


                <?php endwhile ?>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>

<?php $conn -> close(); ?>