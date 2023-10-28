<?php
    include "connect.php";
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT `transcation_id`, `wallet` FROM `transcation` WHERE user_id = SHA2('phanurat', 256) ORDER BY `transcation_id` DESC LIMIT 1;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
        $wallet = $row["wallet"]; // ดึงค่า "wallet" จากฐานข้อมูล
        echo "จำนวน: " . number_format($wallet); // จัดรูปตัวเลข
        }
    } else {
            echo "ไม่พบข้อมูลรายได้ของ $user_id";
        }
?>