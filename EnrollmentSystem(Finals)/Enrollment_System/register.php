<?php include 'config.php';
if (isset($_POST['reg'])) {
    $pp = upload($_FILES['pic']);
    $sig = upload($_FILES['sig']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, password, role, full_name, profile_pic, signature) VALUES (?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $_POST['user'], $pass, $_POST['role'], $_POST['name'], $pp, $sig);
    $stmt->execute();
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>
    <div class="container" style="max-width:500px;">
        <div class="card">
            <h2>Registration</h2>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="name" placeholder="Full Name" required>
                <input type="text" name="user" placeholder="Username" required>
                <input type="password" name="pass" placeholder="Password" required>
                <select name="role">
                    <option value="student">Student</option>
                    <option value="faculty">Faculty</option>
                    <option value="admin">Admin</option>
                </select>
                <label>Profile Picture:</label><input type="file" name="pic" required>
                <label>Signature:</label><input type="file" name="sig" required>
                <button name="reg" class="btn">Register</button>
            </form>
        </div>
    </div>
</body>

</html>