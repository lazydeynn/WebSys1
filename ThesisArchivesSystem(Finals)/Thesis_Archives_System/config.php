<?php
session_start();
$conn = new mysqli("localhost", "root", "", "thesis_archive_db");

function logActivity($uid, $action)
{
    global $conn;
    $stmt = $conn->prepare("INSERT INTO activity_logs (user_id, action) VALUES (?, ?)");
    $stmt->bind_param("is", $uid, $action);
    $stmt->execute();
}

function upload($file)
{
    if (empty($file['name'])) return '';
    $path = 'uploads/' . time() . '_' . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $path);
    return $path;
}
