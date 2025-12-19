<?php include 'config.php';
$uid = $_SESSION['user']['id'];
if (isset($_POST['enroll'])) {
    $sid = $_POST['sub_id'];
    $sub = $conn->query("SELECT prereq_id FROM subjects WHERE id = $sid")->fetch_assoc();
    $can_enroll = true;
    if ($sub['prereq_id']) {
        $pre_id = $sub['prereq_id'];
        $check = $conn->query("SELECT * FROM enrollments WHERE student_id=$uid AND subject_id=$pre_id AND status='completed'");
        if ($check->num_rows == 0) $can_enroll = false;
    }
    if ($can_enroll) $conn->query("INSERT INTO enrollments (student_id, subject_id) VALUES ($uid, $sid)");
    else $msg = "Error: Prerequisite not completed!";
}
$my_enrolled = $conn->query("SELECT e.*, s.subject_code, s.title FROM enrollments e JOIN subjects s ON e.subject_id=s.id WHERE e.student_id=$uid");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar"><span>Student: <?= $_SESSION['user']['full_name'] ?></span><a href="logout.php" style="color:white">Logout</a></div>
    <div class="container">
        <?php if (isset($msg)) echo "<div class='card' style='color:red'>$msg</div>"; ?>
        <div class="card">
            <h3>Available Subjects</h3>
            <form method="POST">
                <select name="sub_id">
                    <?php $avail = $conn->query("SELECT * FROM subjects");
                    while ($a = $avail->fetch_assoc()) echo "<option value='{$a['id']}'>{$a['subject_code']} - {$a['title']}</option>"; ?>
                </select>
                <button name="enroll" class="btn">Enroll Now</button>
            </form>
        </div>
        <div class="card">
            <h3>My Subjects</h3>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Subject</th>
                    <th>Grade</th>
                    <th>Status</th>
                </tr>
                <?php while ($e = $my_enrolled->fetch_assoc()): ?>
                    <tr>
                        <td><?= $e['subject_code'] ?></td>
                        <td><?= $e['title'] ?></td>
                        <td><?= $e['grade'] ?></td>
                        <td><?= $e['status'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>

</html>