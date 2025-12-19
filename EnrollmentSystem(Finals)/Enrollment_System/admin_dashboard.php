<?php include 'config.php';
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') header("Location: index.php");

if (isset($_POST['add_sub'])) {
    $prereq = $_POST['prereq'] ?: null;
    $stmt = $conn->prepare("INSERT INTO subjects (subject_code, title, prereq_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $_POST['code'], $_POST['title'], $prereq);
    $stmt->execute();
}
$subs = $conn->query("SELECT s1.*, s2.subject_code as pre_code FROM subjects s1 LEFT JOIN subjects s2 ON s1.prereq_id = s2.id");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar"><span>Admin: <?= $_SESSION['user']['full_name'] ?></span><a href="logout.php" style="color:white">Logout</a></div>
    <div class="container">
        <div class="card">
            <h3>Add New Subject</h3>
            <form method="POST">
                <input type="text" name="code" placeholder="Subject Code (e.g. CS101)" required>
                <input type="text" name="title" placeholder="Subject Title" required>
                <select name="prereq">
                    <option value="">No Prerequisite</option>
                    <?php
                    $all = $conn->query("SELECT * FROM subjects");
                    while ($s = $all->fetch_assoc()) echo "<option value='{$s['id']}'>{$s['subject_code']}</option>";
                    ?>
                </select>
                <button name="add_sub" class="btn">Save Subject</button>
            </form>
        </div>
        <div class="card">
            <h3>Subject List</h3>
            <table>
                <tr>
                    <th>Code</th>
                    <th>Title</th>
                    <th>Prerequisite</th>
                </tr>
                <?php while ($row = $subs->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['subject_code'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['pre_code'] ?: 'None' ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>

</html>