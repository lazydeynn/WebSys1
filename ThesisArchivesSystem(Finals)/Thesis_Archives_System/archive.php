<?php include 'config.php';
$search = $_GET['q'] ?? '';
$query = "SELECT t.*, f.file_path, u.full_name, p.program_name 
          FROM thesis t 
          JOIN approvals a ON t.id = a.thesis_id 
          JOIN files f ON t.id = f.thesis_id 
          JOIN users u ON t.student_id = u.id 
          JOIN programs p ON t.program_id = p.id 
          WHERE a.status = 'Approved'";

if ($search) {
    $query .= " AND (t.title LIKE '%$search%' OR t.keywords LIKE '%$search%' OR u.full_name LIKE '%$search%')";
}
$results = $conn->query($query);
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar"><span>Thesis Library</span><a href="index.php" style="color:white">Home</a></div>
    <div class="container">
        <div class="card">
            <form method="GET">
                <input type="text" name="q" placeholder="Search title, author, keywords..." value="<?= $search ?>">
                <button class="btn">Search</button>
            </form>
        </div>
        <?php while ($row = $results->fetch_assoc()): ?>
            <div class="card">
                <h3><?= $row['title'] ?> (<?= $row['year_published'] ?>)</h3>
                <p><b>Author:</b> <?= $row['full_name'] ?> | <b>Program:</b> <?= $row['program_name'] ?></p>
                <p><?= $row['abstract'] ?></p>
                <a href="<?= $row['file_path'] ?>" class="btn" download>Download PDF</a>
            </div>
        <?php endwhile; ?>
    </div>
</body>

</html>