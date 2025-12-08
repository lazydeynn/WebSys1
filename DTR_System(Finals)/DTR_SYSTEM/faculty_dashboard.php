<?php
session_start();
include 'db.php';

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
}

if (isset($_GET['delete_my_account'])) {
    $id = $_SESSION['id'];
    $deleteSql = "DELETE FROM users WHERE id = '$id'";
    mysqli_query($conn, $deleteSql);
    session_destroy(); 
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="max-width: 600px;">
        <h2>Faculty Dashboard</h2>
        <div class="profile-header">
            <img src="uploads/<?php echo $_SESSION['photo']; ?>" class="avatar">
            <h3><?php echo $_SESSION['fullname']; ?></h3>
            <button class="logout-btn"><a href="logout.php">Log Out</a></button>
            <button class="delete-btn">
                <a href="faculty_dashboard.php?delete_my_account=true" onclick="return confirm('Do you want to delete your account?');">Delete Account</a>
            </button>
        </div>
        <table>
            <tr>
                <th>Email</th>
                <th>Date Created</th>
            </tr>
            <tr>
                <td><?php echo $_SESSION['email']; ?></td>
                <td><?php echo $_SESSION['date_created']; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>