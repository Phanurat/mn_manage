<?php
include 'connect.php'; // รวมไฟล์เชื่อมต่อฐานข้อมูล

// รับข้อมูลจาก form login.php
$userid = $_POST['userid'];
$password = $_POST['password'];

// ตรวจสอบการเชื่อมต่อกับฐานข้อมูล
if ($conn) {
    // ใช้คำสั่ง SQL เพื่อค้นหาผู้ใช้โดยใช้ SHA-256 สำหรับรหัสผ่าน
    $sql = "SELECT * FROM users WHERE user_id = '$userid' AND user_pass = SHA2('$password', 256)";

    // ทำคำสั่ง SQL และรับผลลัพธ์
    $result = $conn->query($sql);

    // ตรวจสอบว่ามีผู้ใช้ในฐานข้อมูลหรือไม่
    if ($result->num_rows > 0) {
        // พบผู้ใช้ - สามารถทำการล็อกอิน
        session_start(); // เริ่มเซสชัน
        $_SESSION['user_id'] = $userid; // บันทึกชื่อผู้ใช้ในเซสชัน
        header("Location: ../dashboard.php"); // นำไปยังหน้า Dashboard หรือหน้าอื่น ๆ ที่คุณต้องการ
        exit; // ตั้งค่าการออกจากสคริปต์เพื่อหยุดการดำเนินการในทันที
    } else {
        // ไม่พบผู้ใช้ - แจ้งเตือนล็อกอินไม่สำเร็จ
        echo "ล็อกอินไม่สำเร็จ: ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
} else {
    echo "เชื่อมต่อกับฐานข้อมูลไม่สำเร็จ";
}
?>
