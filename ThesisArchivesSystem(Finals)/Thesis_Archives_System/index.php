<?php include 'config.php';
if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $res = $conn->query("SELECT * FROM users WHERE username='$u'");
    $row = $res->fetch_assoc();
    if ($row && password_verify($_POST['password'], $row['password'])) {
        $_SESSION['user'] = $row;
        logActivity($row['id'], "User Logged In");
        header("Location: dashboard_" . $row['role'] . ".php");
    } else {
        $err = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body style="display:flex; justify-content:center; align-items:center; height:100vh;">
    <div class="card" style="width:350px;">
        <h2 style="text-align:center">Thesis Archive</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required style="margin-bottom:10px;">
            <input type="password" name="password" placeholder="Password" required style="margin-bottom:10px;">
            <button name="login" class="btn" style="width:100%">Login</button>
        </form>
        <p align="center"><a href="register.php">Register Account</a></p>
    </div>
</body>

</html>