<?php
    include "connect.php";
    session_start();
    if (!isset($_SESSION['user_id'])) {
        // ถ้าผู้ใช้ยังไม่ล็อกอิน ให้เปลี่ยนเส้นทางไปยังหน้า Login หรือทำสิ่งที่คุณต้องการ
        header("Location: ../login.php");
        exit;
    }
    $userid = $_SESSION["user_id"];
    $name_bank = $_POST["name_bank"];
    $wallet_bank = $_POST["wallet_bank"]; // แก้ชื่อค่าจาก $_PORT เป็น $_POST;

    /*echo $userid;
    echo $name_bank;
    echo $wallet_bank;*/

    $sql = "INSERT INTO `bank`(`name_bank`, `user_id`, `wallet_bank`) VALUES ('$name_bank','$userid','$wallet_bank');";
    
    if ($conn->query($sql) === TRUE) {
        echo "Saved!!!";
        header("Location: ../edit_bank.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        //header("Location: ../login.php");
    }
    $conn->close();
?>