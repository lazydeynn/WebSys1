<?php
session_start();
include 'db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit;
}

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    if($id != $_SESSION['id']){
        $deleteSql = "delete from users where id = '$id'";
        mysqli_query($conn, $deleteSql);
    }
    header("Location: admin_dashboard.php");
}

$search = "";
$sort = "id";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
}

$sql = "select * from users where fullname like '%$search%' or email like '%$search%' order by $sort ASC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="admin-container">
        <h2>Admin Dashboard</h2>
        <button class="add-btn"><a href="add_user.php">Add User</a></button>
        <button class="logout-btn"><a href="logout.php">Logout</a></button>
        <br><br>
        <form method="GET">
            <input type="text" name="search" placeholder="Search name or email" value="<?php echo $search; ?>">
            <button type="submit" class="search-btn">Search</button>
        </form>
        <table>
            <tr>
                <th><a href="?sort=id&search=<?php echo $search; ?>">ID</a></th>
                <th><a href="?sort=fullname&search=<?php echo $search; ?>">Full Name</a></th>
                <th><a href="?sort=email&search=<?php echo $search; ?>">Email</a></th>
                <th><a href="?sort=role&search=<?php echo $search; ?>">Role</a></th>
                <th><a href="?sort=created_at&search=<?php echo $search; ?>">Date Created</a></th>
                <th>Action</th>
            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['fullname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <?php if($row['id'] != $_SESSION['id']): ?>
                            <button class="delete-btn"><a href="admin_dashboard.php?delete_id=<?php echo $row['id']; ?>">Delete</a></button>
                            <?php else: ?>
                            (You)
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='6'>No records found.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>