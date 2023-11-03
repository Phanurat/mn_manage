<?php
//Check Get Value from edit_bank.php
/*if (!empty($id_bank)) {
    echo "ID ของธนาคาร: " . $id_bank;
} else {
    echo "ไม่พบ ID ของธนาคาร";
}*/
include "process/connect.php";
$id_bank = $_GET["id"];

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
    <title>แก้ไขบัญชีธนาคาร</title>
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
        <h1>แก้ไขธนาคาร</h1>
        <form action="process/update_bank.php" method="post">
            <label for="name_bank">ชื่อธนาคารเดิม: <?php
                $id_bank = $_GET["id"];
                $sql = "SELECT `id_bank`, `name_bank`, `wallet_bank` FROM `bank` WHERE id_bank = '$id_bank'";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $id_bank = $row["id_bank"];
                        $name_bank = $row["name_bank"];
                        $wallet_bank = $row["wallet_bank"];
                        echo $name_bank;
                    }
                ?></label>
            <input type="text" name="name_bank" placeholder="กรอกชื่อธนาคาร">
            <input type="hidden" name="id_bank" value= <?php echo $id_bank = $_GET["id"];?>>

            <label for="wallet_bank">จำนวนเงินเดิม: <?php echo $wallet_bank;?></label>
            <input type="number" name="wallet_bank" placeholder="จำนวนเงิน">
            <button type="submit">บันทึก</button>
        </form>
        <div>
            <form action="process/delete_bank.php" method="post">    
                <input type="hidden" name="id_bank" value="<?php echo $id_bank; ?>">
                <button type="submit" style="color: white; background-color: red;">ลบ</button>        
            </form>    
        </div>    
    </div>
</body>
</html>
<?php
    }else{
        echo "ไม่พบข้อมูลธนาคารของคุณ '$user_id'";         
        echo "หรือโปรดเพิ่มบัญชีธนาคารของคุณ";
    }        
?>
