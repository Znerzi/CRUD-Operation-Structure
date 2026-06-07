<?php
// UPDATE - Edit applicant
include 'db.php';

$message = ""; // For success/error messages
$id = $_GET['id']; // Get applicant ID from URL

// SQL query to get applicant data
$sql = "SELECT * FROM applicants WHERE id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Check if form was submitted to update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get updated data from form
    $name = $_POST['name'];
    $location = $_POST['location'];
    $position = $_POST['position'];
    
    // SQL query to update applicant
    $sql = "UPDATE applicants SET name = '$name', location = '$location', position = '$position' WHERE id = $id";
    
    // Execute query
    if ($conn->query($sql) === TRUE) {
        // Redirect to prevent duplicate submission on page refresh
        header("Location: index.php?msg=updated");
        exit();
    } else {
        $message = "<p class='error'>✗ Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Applicant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Edit Applicant</h1>
    
    <!-- Display message if any -->
    <?php echo $message; ?>
    
    <!-- Form to edit applicant -->
    <form method="POST" class="form">
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required value="<?php echo $row['name']; ?>">
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required value="<?php echo $row['location']; ?>">
        
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" required value="<?php echo $row['position']; ?>">
        
        <button type="submit" class="btn btn-submit">Update Applicant</button>
        <a href="index.php" class="btn btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
