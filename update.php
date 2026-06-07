<?php
include 'db.php';

$message = "";
$id = $_GET['id'];

$row = $conn->query("SELECT * FROM applicants WHERE id=$id")->fetch_assoc();

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $location = $_POST['location'];
    $position = $_POST['position'];

    if ($conn->query("UPDATE applicants SET name='$name', location='$location', position='$position' WHERE id=$id")) {
        header("Location: index.php?msg=updated");
        exit();
    } else {
        $message = "<p class='error'>Error: " . $conn->error . "</p>";
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
    
    <?= $message; ?>
    
    <form method="POST" class="form">
        
        <label>Name:</label>
        <input type="text" name="name" required value="<?= $row['name']; ?>">
        
        <label>Location:</label>
        <input type="text" name="location" required value="<?= $row['location']; ?>">
        
        <label>Position:</label>
        <input type="text" name="position" required value="<?= $row['position']; ?>">
        
        <button type="submit" name="submit" class="btn btn-submit">Update Applicant</button>
        <a href="index.php" class="btn btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>