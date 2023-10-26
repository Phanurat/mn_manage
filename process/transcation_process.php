<?php
if (isset($_POST['user_id']) && isset($_POST['user_name'])) {
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $list_name = $_POST["list_name"];
    $money = $_POST["money"];
    $type = $_POST["type"];
    // ตอนนี้คุณมีค่า $user_id และ $user_name ให้ใช้งานได้

    echo $user_id;
    echo $user_name;
    echo $list_name;
    echo $money;
    echo $type;
}   else    {
    // แสดงข้อความข้อผิดพลาดหรือทำอะไรที่คุณต้องการเมื่อข้อมูลไม่ถูกส่งมาในฟอร์ม
    echo "ข้อมูลไม่ถูกส่งมาในฟอร์ม";
}
?>