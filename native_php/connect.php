<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "db_mahasiswa";

$conn = new mysqli($host, $user, $pass, $db_name);

if ($conn->connect_error) {
    die(json_encode(['status' => false, 'message' => 'Database connection failed']));
}
?>
