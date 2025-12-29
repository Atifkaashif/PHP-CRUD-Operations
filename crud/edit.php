<?php
include 'db.php';
$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM students WHERE id=$id"));

if (isset($_POST['update'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $course = $_POST['course'];

    mysqli_query($conn,
        "UPDATE students SET
         name='$name', email='$email', phone='$phone', course='$course'
         WHERE id=$id"
    );

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">
    <input type="text" name="name" value="<?= $data['name'] ?>" required>
    <input type="email" name="email" value="<?= $data['email'] ?>" required>
    <input type="text" name="phone" value="<?= $data['phone'] ?>" required>
    <input type="text" name="course" value="<?= $data['course'] ?>" required>
    <button name="update">Update</button>
</form>

</body>
</html>
