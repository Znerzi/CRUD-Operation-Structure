<?php
include 'db.php';

$message = "";

if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'success') {
        $message = "<p class='success'>✓ Added successfully!</p>";
    } elseif ($_GET['msg'] == 'updated') {
        $message = "<p class='success'>✓ Updated successfully!</p>";
    } elseif ($_GET['msg'] == 'deleted') {
        $message = "<p class='success'>✓ Deleted successfully!</p>";
    }
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

    <?= $message; ?>

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
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['location']; ?></td>
                    <td><?= $row['position']; ?></td>
                        <td>
                            <a href="read.php?id=<?= $row['id']; ?>" class="btn btn-add">View</a>

                            <a href="update.php?id=<?= $row['id']; ?>" class="btn btn-edit">Edit</a>

                            <a href="#" onclick="deleteWithUndo(<?= $row['id']; ?>)" class="btn btn-delete">Delete</a>
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

<div id="toast" class="toast">
    <span>Deleting in 5s...</span>
    <button onclick="undoDelete()">Undo</button>
</div>

<script>
let timer;
let deleteId;
let sec = 5;

function deleteWithUndo(id) {
    deleteId = id;
    sec = 5;

    document.getElementById("toast").style.display = "block";
    updateText();

    timer = setInterval(() => {
        sec--;
        updateText();

        if (sec === 0) {
            clearInterval(timer);
            window.location.href = "delete.php?id=" + deleteId;
        }
    }, 1000);
}

function undoDelete() {
    clearInterval(timer);
    document.getElementById("toast").style.display = "none";
}

function updateText() {
    document.querySelector("#toast span").innerText =
        "Deleting in " + sec + "s...";
}
</script>

</body>
</html>

<?php
$conn->close();
?>