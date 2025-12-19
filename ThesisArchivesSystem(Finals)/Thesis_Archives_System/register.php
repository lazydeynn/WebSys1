<?php include 'config.php';
if (isset($_POST['reg'])) {
    $pp = upload($_FILES['pic']);
    $sig = upload($_FILES['sig']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $conn->query("INSERT INTO users (username, password, role, full_name, dept_id, profile_pic, signature) 
                  VALUES ('{$_POST['user']}', '$pass', '{$_POST['role']}', '{$_POST['name']}', '{$_POST['dept']}', '$pp', '$sig')");
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container" style="max-width:500px;">
        <div class="card">
            <h3>Register</h3>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group"><input type="text" name="name" placeholder="Full Name" required></div>
                <div class="form-group"><input type="text" name="user" placeholder="Username" required></div>
                <div class="form-group"><input type="password" name="pass" placeholder="Password" required></div>
                <div class="form-group">
                    <select name="role">
                        <option value="student">Student</option>
                        <option value="faculty">Faculty</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="dept">
                        <option value="">Select Department</option>
                        <?php $d = $conn->query("SELECT * FROM departments");
                        while ($r = $d->fetch_assoc()) echo "<option value='{$r['id']}'>{$r['dept_name']}</option>"; ?>
                    </select>
                </div>
                <div class="form-group"><label>Profile Pic</label><input type="file" name="pic" required></div>
                <div class="form-group"><label>Signature</label><input type="file" name="sig" required></div>
                <button name="reg" class="btn">Sign Up</button>
            </form>
        </div>
    </div>
</body>

</html>