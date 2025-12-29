<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body { font-family: Arial; background:#f4f6f8; }
        .container { width:700px; margin:auto; background:#fff; padding:20px; }
        input, button { padding:8px; width:100%; margin:5px 0; }
        table { width:100%; border-collapse:collapse; margin-top:20px; }
        th, td { border:1px solid #ccc; padding:8px; text-align:center; }
        th { background:#2563eb; color:white; }
        a { text-decoration:none; color:white; padding:5px 8px; }
        .edit { background:#22c55e; }
        .delete { background:#ef4444; }
    </style>
</head>
<body>

<div class="container">
<h2>Student Registration</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Student Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <input type="text" name="course" placeholder="Course" required>
    <button name="save">Save Student</button>
</form>

<?php
if (isset($_POST['save'])) {
    $name   = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $course = $_POST['course'];

    mysqli_query($conn,
        "INSERT INTO students (name,email,phone,course)
         VALUES ('$name','$email','$phone','$course')"
    );
}
?>

<table>
<tr>
    <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM students");
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['phone'] ?></td>
    <td><?= $row['course'] ?></td>
    <td>
        <a class="edit" href="edit.php?id=<?= $row['id'] ?>">Edit</a>
        <a class="delete" href="delete.php?id=<?= $row['id'] ?>">Delete</a>
    </td>
</tr>
<?php } ?>
</table>
</div>

</body>
</html>
