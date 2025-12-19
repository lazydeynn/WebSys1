<?php include 'config.php';
if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $res = $conn->query("SELECT * FROM users WHERE username='$user'");
    $u = $res->fetch_assoc();
    if ($u && password_verify($_POST['password'], $u['password'])) {
        $_SESSION['user'] = $u;
        header("Location: " . $u['role'] . "_dashboard.php");
    } else {
        $err = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body style="display:block; text-align:center;">
    <div class="container" style="max-width:400px; margin-top:100px;">
        <div class="card">
            <h2>School Portal</h2>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button name="login" class="btn">Login</button>
            </form>
            <p>New user? <a href="register.php">Create Account</a></p>
            <?php if (isset($err)) echo "<p style='color:red'>$err</p>"; ?>
        </div>
    </div>
</body>

</html>