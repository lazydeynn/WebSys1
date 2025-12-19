<?php include 'config.php';
if ($_SESSION['user']['role'] != 'admin') header("Location: index.php");

if (isset($_GET['backup'])) {
    $filename = "backup_" . date("Y-m-d_H-i-s") . ".sql";
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    $tables = ['users', 'departments', 'programs', 'thesis', 'files', 'approvals', 'review_logs', 'activity_logs'];
    foreach ($tables as $t) {
        $res = $conn->query("SELECT * FROM $t");
        while ($row = $res->fetch_assoc()) {
            $vals = array_map(function ($x) {
                global $conn;
                return "'" . $conn->real_escape_string($x) . "'";
            }, $row);
            echo "INSERT INTO $t VALUES (" . implode(',', $vals) . ");\n";
        }
    }
    exit;
}

if (isset($_POST['add_dept'])) $conn->query("INSERT INTO departments (dept_name) VALUES ('{$_POST['dn']}')");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar"><span>Admin</span><a href="logout.php" style="color:white">Logout</a></div>
    <div class="container">
        <div class="card" style="display:flex; justify-content:space-between; align-items:center;">
            <h3>System Maintenance</h3>
            <a href="?backup=1" class="btn">Download SQL Backup</a>
        </div>

        <div class="card">
            <h3>Manage Structure</h3>
            <form method="POST">
                <input type="text" name="dn" placeholder="New Department Name">
                <button name="add_dept" class="btn">Add Department</button>
            </form>
        </div>

        <div class="card">
            <h3>Activity Logs</h3>
            <table style="font-size:0.9em">
                <tr>
                    <th>User</th>
                    <th>Action</th>
                    <th>Time</th>
                </tr>
                <?php
                $logs = $conn->query("SELECT a.*, u.username FROM activity_logs a JOIN users u ON a.user_id=u.id ORDER BY log_time DESC LIMIT 50");
                while ($l = $logs->fetch_assoc()) echo "<tr><td>{$l['username']}</td><td>{$l['action']}</td><td>{$l['log_time']}</td></tr>";
                ?>
            </table>
        </div>
    </div>
</body>

</html>