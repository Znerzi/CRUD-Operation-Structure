<?php 
include 'db.php';

$message = "";

if (isset ($_POST['submit'])){
    $name = $_POST['name'];
    $location = $_POST['location'];
    $position = $_POST['position'];

    if ($conn -> query("INSERT INTO applicants (name, location, position) VALUES ('$name', '$location', '$position')")){
        header("Location: index.php?msg=success");
        exit();
    } else {
        $message = "<p class='error'> Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Applicant</title>
</head>

<body>
    <div class="container">
        <h1>Add Applicant</h1>

        <?php echo $message; ?>

        <form method="POST" class="form">
            <label for="Name"></label>
            <input type="text" id="name" name="name" placeholder="Enter applicant name..." required value="<?=isset($name) ? $name : '' ?>">

            <label for="Location"></label>
            <input type="text" id="location" name="location" placeholder="Enter applicant location..." required value="<?=isset($location) ? $location : '' ?>">

            <label for="Position"></label>
            <input type="text" id="position" name="position" placeholder="Enter applicant position..." required value="<?=isset($position) ? $position : '' ?>">

            <button type="submit" name="submit" class="btn btn-submit">Add Applicant</button>
            <a href="index.php" class="btn btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>