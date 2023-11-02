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
    <title>แก้ไขเงินสด</title>
</head>
<body>
    <ul>
        <li class="dropdown">
            <a href="dashboard.php" class="dropbtn"><</a>
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
        <h1>แก้ไขเงินสด</h1>
        <form action="process/edit_fiat.php" method="post">
            <label for="wallet">เงินสด: <?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT `transcation_id`, `wallet` FROM `transcation` WHERE user_id = SHA2('$user_id', 256) AND `wallet` IS NOT NULL ORDER BY `transcation_id` DESC LIMIT 1;";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $wallet = $row["wallet"];
                        echo number_format($wallet) . " บาท";
                    }
                } else {
                    echo "ไม่พบข้อมูลรายได้ของ $user_id";
                }
                ?></label>
            <input type="number" name="wallet" placeholder="กรอกจำนวนเงิน" value= <?php echo $wallet?>>
            <button type="submit">บันทึก</button>
        </form>
    </div>
</body>
</html>