<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // ถ้าผู้ใช้ยังไม่ล็อกอิน ให้เปลี่ยนเส้นทางไปยังหน้า Login หรือทำสิ่งที่คุณต้องการ
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style_dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    <h2>Card</h2>
    <div class="card">
        <div class="container">
            <h4><b>User Name</b></h4> 
            <p>รายการทั้งหมด</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>John Doe</b></h4> 
            <p>Architect & Engineer</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>John Doe</b></h4> 
            <p>Architect & Engineer</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>John Doe</b></h4> 
            <p>Architect & Engineer</p> 
        </div>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>John Doe</b></h4> 
            <p>Architect & Engineer</p> 
        </div>
    </div>
</body>
</html>
