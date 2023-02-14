<?php
$url = 'localhost';
$username = 'root';
$password = '';

$conn = new mysqli($url, $username, $password, 'project');
if ($conn->connect_error) {
die("Connection failed!:" . $conn->connect_error);
}
?>