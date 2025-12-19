<?php
session_start();
$conn = new mysqli("localhost", "root", "", "enrollment_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

function upload($file)
{
    if (!$file['name']) return null;
    $path = 'uploads/' . time() . '_' . $file['name'];
    move_uploaded_file($file['tmp_name'], $path);
    return $path;
}
