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
    <title>Bank</title>
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
            <p>ธนาคารทั้งหมด</p> 
        </div>
        <a href="add_bank.php" class="add-report-button">เพิ่มธนาคาร</a>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>SCB ไทยพาณิชย์</b></h4>
            <p>
            <?php
                 echo "100";          
                ?>
            </p>
        </div>
        <a class="circle-button" href="#" style="text-decoration: none">+</a>
    </div>
    <div class="card">
        <div class="container">
            <h4><b>บัญชีธนาคาร</b></h4> 
            <p>0</p> 
        </div>
        <a class="circle-button" href="#" style="text-decoration: none">+</a>
    </div>

    <div class="card">
        <div class="container">
            <h4><b>ค้างรับ</b></h4> 
            <p>2,000 บาท</p> 
        </div>
        <a class="circle-button" href="#" style="text-decoration: none">+</a>
    </div>

    <div class="card">
        <div class="container">
            <h4><b>ค้างจ่าย</b></h4> 
            <p>1,500 บาท</p> 
        </div>
        <a class="circle-button" href="#" style="text-decoration: none">+</a>
    </div>

    <div class="card">
        <div class="container">
            <h4><b>รวมทั้งหมด</b></h4> 
            <p><?php
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT SUM(CASE WHEN type = 'income' THEN money ELSE 0 END) AS total_income,
                               SUM(CASE WHEN type = 'expense' THEN money ELSE 0 END) AS total_expense
                        FROM transcation
                        WHERE user_id = SHA2('$user_id', 256)";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $total_income = $row["total_income"];
                        $total_expense = $row["total_expense"];
                        $total_net_income = $total_income - $total_expense;
                        echo "ธนาคารรวม: " . number_format($total_net_income);
                    }
                } else {
                    echo "ไม่พบข้อมูลรายได้ของ '$user_id'";
                }              
            ?></p> 
        </div>
    </div>
</body>
</html>