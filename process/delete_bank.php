<?php
    include "connect.php";
    session_start();
    if (!isset($_SESSION['user_id'])) {
        // ถ้าผู้ใช้ยังไม่ล็อกอิน ให้เปลี่ยนเส้นทางไปยังหน้า Login หรือทำสิ่งที่คุณต้องการ
        header("Location: login.php");
            exit;
    }

    $user_id = $_SESSION['user_id'];

    $id_bank = $_POST["id_bank"];
    //echo $id_bank;

    $sql = "DELETE FROM bank WHERE id_bank = $id_bank";

    // ตรวจสอบว่าแถวถูกลบเรียบร้อยหรือไม่
    if ($conn->query($sql) === TRUE) {
        echo "ลบธนาคารเรียบร้อยแล้ว";
        // หลังจากลบธนาคารเรียบร้อยแล้ว
        header("Location: ../edit_bank.php");
        exit;
    } else {
        echo "เกิดข้อผิดพลาดในการลบธนาคาร: " . $conn->error;
    }

?>