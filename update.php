<?php 
include 'db.php';

$message = "";

$id = $_GET['id'];
$result = $conn -> query("SELECT * FROM applicants WHERE id = $id");
$row = $result -> fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $position = $_POST['position'];

    if ($conn -> query("UPDATE applicants SET name='$name', location='$location', position='$position' WHERE id = $id")) {
        header("Location: index.php?msg=updated");
        exit();
    } else {
        $message = "<p class='error'> Error: " . $conn -> error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Applicant</title>
</head>
<body>
    <div class="container">
        <h1>Update Applicant</h1>

        <?php echo $message; ?>

        <form method="POST" class="form">
            <label for="name">Name</label>
            <input type="text" name="name" required value="<?= $row['name'] ?>">
            
            <label for="location">Location</label>
            <input type="text" name="location" required value="<?= $row['location'] ?>">
            
            <label for="position">Position</label>
            <input type="text" name="position" required value="<?= $row['position'] ?>">
            
            <button class="btn btn-submit">Update Applicants</button>
            <a href="index.php" class="btn btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>