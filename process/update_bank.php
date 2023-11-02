<?php
    include "connect.php";

    session_start();
    if (!isset($_SESSION['user_id'])) {
        // ถ้าผู้ใช้ยังไม่ล็อกอิน ให้เปลี่ยนเส้นทางไปยังหน้า Login หรือทำสิ่งที่คุณต้องการ
        header("Location: login.php");
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $name_bank = $_POST['name_bank'];
    $id_bank = $_POST['id_bank'];
    $wallet_bank = $_POST['wallet_bank'];

    echo $user_id ."<br>";
    echo $name_bank ."<br>";
    echo $id_bank ."<br>";
    echo $wallet_bank ."<br>"; 
?>