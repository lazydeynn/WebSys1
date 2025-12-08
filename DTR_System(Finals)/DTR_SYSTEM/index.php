<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = md5($password);

    $sql = "select * from users where email = '$email' and password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result); 
        $_SESSION['role'] = $row['role'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['photo'] = $row['photo'];
        $_SESSION['date_created'] = $row['created_at'];

        if($_SESSION['role'] == 'admin'){
            header("Location: admin_dashboard.php");
        } else {
            header("Location: faculty_dashboard.php");
        }
        exit;
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <body>
    <div class="container">
        <h2>Login</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php" class="btn-a">Register</a></p>
    </div>
</body>
</body>
</html>