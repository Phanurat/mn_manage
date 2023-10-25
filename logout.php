<?php
session_start();

// ลบ session ทั้งหมด
session_destroy();

// ลบตัวแปร session
unset($_SESSION);

// เปลี่ยนเส้นทางหลังจากทำลาย session
header("Location: login.php");

?>