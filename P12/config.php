<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnm   = "kantin";
$conn = mysqli_connect($host, $user, $pass, $dbnm);

$conn = new mysqli($host, $user, $pass, $dbnm);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>