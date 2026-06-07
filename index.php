<?php
// READ - Display all applicants
include 'db.php';

// Check for success messages
$message = "";
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'success') {
        $message = "<p class='success'>✓ Applicant added successfully!</p>";
    } elseif ($_GET['msg'] == 'updated') {
        $message = "<p class='success'>✓ Applicant updated successfully!</p>";
    } elseif ($_GET['msg'] == 'deleted') {
        $message = "<p class='success'>✓ Applicant deleted successfully!</p>";
    }
}

// SQL query to select all applicants
$sql = "SELECT * FROM applicants";
$result = $conn->query($sql);
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
    
    <!-- Display success message if any -->
    <?php echo $message; ?>
    
    <!-- Add New Applicant Button -->
    <a href="create.php" class="btn btn-add">+ Add New Applicant</a>
    
    <!-- Display All Applicants in Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if there are applicants
            if ($result->num_rows > 0) {
                // Loop through each applicant and display
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['location'] . "</td>";
                    echo "<td>" . $row['position'] . "</td>";
                    echo "<td>";
                    echo "<a href='update.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a> ";
                    echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure?\");'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='empty'>No applicants found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php $conn->close(); ?>
