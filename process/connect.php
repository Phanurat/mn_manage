<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mn_manage";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ปิดการเชื่อมต่อเมื่อเสร็จสิ้น
//mysqli_close($conn);
?>
