<?php
session_start();
include 'db.php';

if (isset($_POST['register'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $dir = "uploads/";
    $fileName = "default.jpg";

    if (!empty($_FILES['photo']['name'])) {
        $targetFile = $dir . basename($_FILES['photo']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg") {
             $fileName = time() . "_" . basename($_FILES['photo']['name']);
             move_uploaded_file($_FILES['photo']['tmp_name'], $dir . $fileName);
        } else {
            $fileName = "default.jpg"; 
        }
    } 

    $sql = "insert into users (fullname, email, password, role, photo) values ('$name', '$email', MD5('$pass'), '$role', '$fileName')";
            
    if(mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role">
                <option value="faculty">Faculty</option>
                <option value="admin">Admin</option>
            </select>
            <input type="file" name="photo">
            <button type="submit" name="register" class="btn">Register</button>
        </form>
        <p>Already have an account? <a href="index.php" class="btn-a">Login</a></p>
    </div>
</body>
</html>