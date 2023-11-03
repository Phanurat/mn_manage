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
    <link rel="stylesheet" href="style/style_transcation.css">
    <link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css"/>
<body>
    <title>เพิ่มรายงาน</title>
</head>
<body>
    <ul>
        <li class="dropdown">
            <a href="add_transcation.php" class="dropbtn"><</a>
        </li>
        <li class="logout">
            <a href="logout.php" class="logout">Logout</a>
        </li>
    </ul>
    <div>
        <form action="process/transcation_process.php" method="POST">
            <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
            <input type="hidden" name="user_name" value="<?php echo $row['user_name']; ?>">

            <label for="list_name">ชื่อรายการ</label>
            <input type="text" id="list_name" name="list_name" required>

            <label for="money">จำนวนเงิน</label>
            <input type="number" id="money" name="money" required min="0" max="10000000">

            <label for="country">ประเภท</label>
            <select id="type" name="type" class ="custome-select" style="width:120px;" required>
                <option value="income">รายได้</option>
                <option value="expense">รายจ่าย</option>
            </select>                    
            <input type="submit" value="บันทึกรายการ">
        </form>
    </div>    
</body>
</html>
