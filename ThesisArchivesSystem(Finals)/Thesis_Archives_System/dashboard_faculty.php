<?php include 'config.php';
if ($_SESSION['user']['role'] != 'faculty') header("Location: index.php");

if (isset($_POST['review'])) {
    $tid = $_POST['tid'];
    $verdict = $_POST['verdict'];
    $comments = $_POST['comments'];

    $conn->query("UPDATE approvals SET status='$verdict' WHERE thesis_id=$tid");

    $stmt = $conn->prepare("INSERT INTO review_logs (thesis_id, reviewer_id, comments, verdict) VALUES (?,?,?,?)");
    $stmt->bind_param("iiss", $tid, $_SESSION['user']['id'], $comments, $verdict);
    $stmt->execute();

    logActivity($_SESSION['user']['id'], "Reviewed Thesis ID $tid: $verdict");
}

$pending = $conn->query("SELECT t.*, f.file_path, u.full_name, u.signature FROM thesis t 
                         JOIN approvals a ON t.id = a.thesis_id 
                         JOIN files f ON t.id = f.thesis_id 
                         JOIN users u ON t.student_id = u.id 
                         WHERE a.status = 'Pending'");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar"><span>Faculty Review</span><a href="logout.php" style="color:white">Logout</a></div>
    <div class="container">
        <h3>Pending Reviews</h3>
        <?php while ($row = $pending->fetch_assoc()): ?>
            <div class="card">
                <h4><?= $row['title'] ?></h4>
                <p><b>Student:</b> <?= $row['full_name'] ?></p>
                <p><?= $row['abstract'] ?></p>
                <p><a href="<?= $row['file_path'] ?>" target="_blank" class="btn">View PDF</a></p>
                <hr>
                <form method="POST">
                    <input type="hidden" name="tid" value="<?= $row['id'] ?>">
                    <textarea name="comments" placeholder="Review Comments..." required></textarea>
                    <button name="review" value="1" onclick="this.form.verdict.value='Approved'" class="btn" style="background:#27ae60">Approve</button>
                    <button name="review" value="1" onclick="this.form.verdict.value='Rejected'" class="btn" style="background:#c0392b">Reject</button>
                    <input type="hidden" name="verdict">
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>