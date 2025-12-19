<?php include 'config.php';
if (isset($_POST['set_grade'])) {
    $conn->query("UPDATE enrollments SET grade='{$_POST['g']}', status='completed' WHERE id={$_POST['eid']}");
}
$list = $conn->query("SELECT e.*, u.full_name, u.profile_pic, u.signature, s.subject_code FROM enrollments e JOIN users u ON e.student_id=u.id JOIN subjects s ON e.subject_id=s.id");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar"><span>Faculty Dashboard</span><a href="logout.php" style="color:white">Logout</a></div>
    <div class="container">
        <div class="card">
            <h3>Class List & Grading</h3>
            <table>
                <tr>
                    <th>Student</th>
                    <th>Photo</th>
                    <th>Subject</th>
                    <th>Signature</th>
                    <th>Action</th>
                </tr>
                <?php while ($r = $list->fetch_assoc()): ?>
                    <tr>
                        <td><?= $r['full_name'] ?></td>
                        <td><img src="<?= $r['profile_pic'] ?>" class="profile-img"></td>
                        <td><?= $r['subject_code'] ?></td>
                        <td><img src="<?= $r['signature'] ?>" class="sig-img"></td>
                        <td>
                            <form method="POST" style="display:flex; gap:5px;">
                                <input type="hidden" name="eid" value="<?= $r['id'] ?>">
                                <input type="text" name="g" placeholder="Grade" style="margin:0; width:60px;">
                                <button name="set_grade" class="btn" style="padding:5px;">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>

</html>