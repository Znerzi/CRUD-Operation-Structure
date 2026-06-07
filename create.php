<?php
// CREATE - Add new applicant
include 'db.php';

$message = ""; // For success/error messages

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Get data from form
    $name = $_POST['name'];
    $location = $_POST['location'];
    $position = $_POST['position'];
    
    // SQL query to insert new applicant
    $sql = "INSERT INTO applicants (name, location, position) VALUES ('$name', '$location', '$position')";
    
    // Execute query
    if ($conn->query($sql) === TRUE) {
        // Redirect to prevent duplicate submission on page refresh
        header("Location: index.php?msg=success");
        exit();
    } else {
        $message = "<p class='error'>✗ Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Applicant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Add New Applicant</h1>
    
    <!-- Display message if any -->
    <?php echo $message; ?>
    
    <!-- Form to add new applicant -->
    <form method="POST" class="form">
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter applicant name" required value="<?php echo isset($name) ? $name : ''; ?>">
        
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" placeholder="Enter location" required value="<?php echo isset($location) ? $location : ''; ?>">
        
        <label for="position">Position:</label>
        <input type="text" id="position" name="position" placeholder="Enter position" required value="<?php echo isset($position) ? $position : ''; ?>">
        
        <button type="submit" class="btn btn-submit">Add Applicant</button>
        <a href="index.php" class="btn btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>
