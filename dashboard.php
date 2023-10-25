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
    <h1>Welcome to Your Dashboard</h1>

    <div class="button-container">
        <div class="button">
            <img src="icon1.png" alt="Icon 1">
            <button>Edit</button>
            <p>Button 1</p>
        </div>
        <div class="button">
            <img src="icon2.png" alt="Icon 2">
            <button>Edit</button>
            <p>Button 2</p>
        </div>
        <div class="button">
            <img src="icon3.png" alt="Icon 3">
            <button>Edit</button>
            <p>Button 3</p>
        </div>
        <div class="button">
            <img src="icon4.png" alt="Icon 4">
            <button>Edit</button>
            <p>Button 4</p>
        </div>
        <div class="button">
            <img src="icon5.png" alt="Icon 5">
            <button>Edit</button>
            <p>Button 5</p>
        </div>
    </div>
</body>
</html>
