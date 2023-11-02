<?php
    include "connect.php";
    session_start();
    if (!isset($_SESSION['user_id'])) {
        // ถ้าผู้ใช้ยังไม่ล็อกอิน ให้เปลี่ยนเส้นทางไปยังหน้า Login หรือทำสิ่งที่คุณต้องการ
        header("Location: login.php");
        exit;
    }

    if(isset($_POST["wallet"])) {
        $update_wallet = $_POST["wallet"];
        $user_id = $_SESSION['user_id'];

        // ทำการอัปเดตค่าเงินสดในฐานข้อมูล
        $sql = "UPDATE transcation SET wallet = '$update_wallet' WHERE user_id = SHA2('$user_id', 256) ORDER BY transcation_id DESC LIMIT 1";
        if ($conn->query($sql) === TRUE) {
            // ถ้าอัปเดตสำเร็จ
            echo "อัปเดตเงินสดเป็น: " . $update_wallet;
            header("Location: ../edit_fiat.php");
        } else {
            // ถ้าเกิดข้อผิดพลาดในการอัปเดต
            echo "เกิดข้อผิดพลาดในการอัปเดตเงินสด: " . $conn->error;
        }
    }
?>
