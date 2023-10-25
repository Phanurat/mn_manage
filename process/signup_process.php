<?php
include "connect.php";

$userid = $_POST["userid"];
$username = $_POST["username"];
$userpassword = $_POST["password"]; // แก้ชื่อค่าจาก $_PORT เป็น $_POST
$useremail = $_POST["email"];

// ใช้คำสั่ง SQL ให้ถูกต้อง
$sql = "INSERT INTO users (user_id, user_name, user_pass, user_email) VALUES ('$userid', '$username', SHA2('$userpassword', 256), '$useremail')";

if ($conn->query($sql) === TRUE) {
    echo "Saved!!!";
    header("Location: ../login.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    //header("Location: ../login.php");
}

$conn->close();
?>
