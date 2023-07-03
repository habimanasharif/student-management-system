<?php
$servername = "localhost";
$username = "root";
$password = "sharif#123";
$dbname = "student_system";
global $conn;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}