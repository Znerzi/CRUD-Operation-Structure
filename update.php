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
        $message = "<p class='error'>Error: $result -> error </p>";
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

    <?= $message ?>

    <form method="POST" class="form">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $row['name'] ?>" required>

        <label>Location:</label>
        <input type="text" name="location" value="<?= $row['location'] ?>" required>

        <label>Position:</label>
        <input type="text" name="position" value="<?= $row['position'] ?>" required>

        <button type="submit" class="btn btn-submit">Update</button>
        <a href="index.php" class="btn btn-cancel">Cancel</a>
    </form>
</div>

</body>
</html>

<?php $conn->close(); ?>