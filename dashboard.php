<?php
include "process/connect.php";
session_start();
if (!isset($_SESSION['user_id'])) {
    // ถ้าผู้ใช้ยังไม่ล็อกอิน ให้เปลี่ยนเส้นทางไปยังหน้า Login หรือทำสิ่งที่คุณต้องการ
    header("Location: login.php");
    exit;
}

$sql = "SELECT user_id, user_name FROM users WHERE user_id = '" . $_SESSION['user_id'] . "'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_dashboard.css">
    <link rel="stylesheet" href="style/style_button.css">
    <link rel="stylesheet" href="style/style_menubar.css">
<body>
    <title>Dashboard</title>
</head>
<body>
    <ul>
        <li class="dropdown">
            <a href="#" class="dropbtn">Menu</a>
        </li>
        <li class="logout">
            <a href="logout.php" class="logout">Logout</a>
        </li>
    </ul>
    <div class="card">
        <div class="container">
            <h4><b><?php echo "User ID: " . $row["user_id"];?></b></h4>
            <h4><b><?php echo "Name: " . $row["user_name"];?></b></h4> 
            <p>รายการทั้งหมด</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>เงินสด</b></h4> 
            <p>20,000 บาท</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>บัญชีธนาคาร</b></h4> 
            <p>100,000 บาท</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>ค้างรับ</b></h4> 
            <p>2,000 บาท</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>ค้างจ่าย</b></h4> 
            <p>1,500 บาท</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>คงเหลือ</b></h4> 
            <p>120,500 บาท</p> 
        </div>
    </div>
    <a href="#" class="add-report-button">เพิ่มรายงาน</a>
</body>
</html>
