<?php include 'config.php';
if ($_SESSION['user']['role'] != 'student') header("Location: index.php");
$uid = $_SESSION['user']['id'];

if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO thesis (student_id, program_id, title, abstract, keywords, adviser, year_published) VALUES (?,?,?,?,?,?,?)");
    $year = date('Y');
    $stmt->bind_param("iisssss", $uid, $_POST['prog'], $_POST['title'], $_POST['abs'], $_POST['key'], $_POST['adv'], $year);
    $stmt->execute();
    $thesis_id = $conn->insert_id;

    $path = upload($_FILES['pdf']);
    $conn->query("INSERT INTO files (thesis_id, file_path) VALUES ($thesis_id, '$path')");

    $conn->query("INSERT INTO approvals (thesis_id, status) VALUES ($thesis_id, 'Pending')");

    logActivity($uid, "Submitted Thesis: " . $_POST['title']);
}

$my_thesis = $conn->query("SELECT t.title, a.status FROM thesis t JOIN approvals a ON t.id = a.thesis_id WHERE t.student_id = $uid");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar"><span>Student Portal</span><a href="logout.php" style="color:white">Logout</a></div>
    <div class="container">
        <div class="card">
            <h3>Submit Thesis</h3>
            <form method="POST" enctype="multipart/form-data">
                <input type="text" name="title" placeholder="Title" required>
                <textarea name="abs" placeholder="Abstract" required></textarea>
                <input type="text" name="key" placeholder="Keywords">
                <input type="text" name="adv" placeholder="Adviser">
                <select name="prog">
                    <?php $p = $conn->query("SELECT * FROM programs");
                    while ($row = $p->fetch_assoc()) echo "<option value='{$row['id']}'>{$row['program_name']}</option>"; ?>
                </select>
                <label>Thesis File (PDF)</label><input type="file" name="pdf" required accept=".pdf">
                <button name="submit" class="btn" style="margin-top:10px;">Submit</button>
            </form>
        </div>
        <div class="card">
            <h3>My Submissions</h3>
            <table>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
                <?php while ($row = $my_thesis->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['title'] ?></td>
                        <td><span class="badge <?= $row['status'] ?>"><?= $row['status'] ?></span></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>
</body>

</html>