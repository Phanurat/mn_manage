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
    <link rel="stylesheet" href="style/style_signup.css">

<body>
    <title>เพิ่มธนาคาร</title>
</head>
<body>
    <ul>
        <li class="dropdown">
            <a href="edit_bank.php" class="dropbtn"><</a>
        </li>
        <li class="logout">
            <a href="logout.php" class="logout">Logout</a>
        </li>
    </ul>
    <div class="card">
        <div class="container">
            <h4><b><?php echo "User ID: " . $row["user_id"];?></b></h4>
            <h4><b><?php echo "Name: " . $row["user_name"];?></b></h4>  
        </div>
    </div>
    <div class="signup-container">
        <h1>เพิ่มธนาคาร</h1>
        <form action="process/add_bank.php" method="post">
            <label for="name_bank">ชื่อธนาคาร:</label>
            <input type="text" name="name_bank" placeholder="กรอกชื่อธนาคาร">

            <input type="hidden" name="user_id" value= <?php $row["user_id"];?>>

            <label for="wallet_bank">จำนวนเงินเริ่มต้น:</label>
            <input type="number" name="wallet_bank" placeholder="จำนวนเงิน">
            <button type="submit">บันทึก</button>
        </form>
    </div>
</body>
</html>