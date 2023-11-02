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

$sql = "SELECT COUNT(name_bank) AS 'TOTAL BANK', SUM(wallet_bank) AS 'TOTAL BATH' FROM bank WHERE user_id = '" . $_SESSION['user_id'] . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $bankData = $result->fetch_assoc();
    $total_bank = $bankData["TOTAL BANK"];
    $total_bath = $bankData["TOTAL BATH"];
} else {
    $total_bank = 0;
    $total_bath = 0;
}

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
    <title>Bank</title>
</head>
<body>
    <ul>
        <li class="dropdown">
            <a href="dashboard.php" class="dropbtn"><</a>
        </li>
        <li class="logout">
            <a href="add_bank.php" class="logout">เพิ่มธนาคาร</a>
        </li>
    </ul>
    <div class="card">
        <div class="container">
            <h4><b><?php echo "User ID: " . $row["user_id"];?></b></h4>
            <h4><b><?php echo "Name: " . $row["user_name"];?></b></h4> 
            <p>
                <?php
                    echo "ธนาคารรวม: " . number_format($total_bank) . "<br>";
                    echo "เงินทั้งหมด: " . number_format($total_bath);
                ?>
            </p> 
        </div>
    </div>    
    <?php
    $user_id = $_SESSION["user_id"];
    $sql = "SELECT `id_bank`, `name_bank`, `wallet_bank` FROM `bank` WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_bank = $row["id_bank"];
            $name_bank = $row["name_bank"];
            $wallet_bank = $row["wallet_bank"];
    ?>
    <div class="card">
        <div class="container">
            <h4><b><?php echo $name_bank; ?></b></h4>
            <p><?php echo number_format($wallet_bank); ?></p>
        </div>
        <a class="circle-button" href="manage_bank.php?id=<?php echo $id_bank; ?>" style="text-decoration: none">+</a>
    </div>
    <?php
        }
    } else {
        echo "ไม่พบข้อมูลธนาคารของ '$user_id'";
    }
    ?>
</body>
</html>
