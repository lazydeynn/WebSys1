<?php
session_start();
include 'db.php';

if (isset($_POST['save_user'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $dir = "uploads/";

    if (!empty($_FILES['photo']['name'])) {
        $fileName = time() . "_" . basename($_FILES['photo']['name']);
        $targetPath = $dir . $fileName;

        if (!move_uploaded_file($_FILES['photo']['tmp_name'], $targetPath)) {
            $fileName = "default.jpg";
        }
    } else {
        $fileName = "default.jpg";
    }

    $sql = "insert into users (fullname, email, password, role, photo) values ('$name', '$email', MD5('$pass'), '$role', '$fileName')";
    $result = mysqli_query($conn, $sql);
    header("Location: admin_dashboard.php");
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h2>Add New User</h2>
        
        <?php
        if(isset($error)) echo "<p style='color:red'>$error</p>";
        ?>

        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role">
                <option value="faculty">Faculty</option>
                <option value="admin">Admin</option>
            </select>
            <input type="file" name="photo">
            <br>
            <div class="add-user">
            <button type="submit" name="save_user" class="btn">Save User</button>&nbsp;&nbsp;
            <button class="cancel-btn"><a href="admin_dashboard.php">Cancel</a></button>
            </div>
        </form>
    </div>

</body>
</html>