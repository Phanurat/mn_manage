<?php
include "connect.php";
if (isset($_POST['user_id']) && isset($_POST['user_name'])) {
    // รับข้อมูลจากฟอร์ม
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $list_name = $_POST['list_name'];
    $money = $_POST['money'];
    $type = $_POST['type'];

    /*echo $user_id;
    echo $user_name;

    echo var_dump($_POST);*/

    $sql = "INSERT INTO `transcation`(`user_id`, `user_name`, `list_name`, `money`, `type`) 
    VALUES (SHA2('$user_id', 256), SHA2('$user_name', 256), '$list_name', '$money', '$type')";

    
    if ($conn->query($sql) === TRUE) {
        echo "บันทึกข้อมูลสำเร็จ";
    } else {
        echo "การบันทึกข้อมูลล้มเหลว: " . $conn->error;
    }

} else {
    // แสดงข้อความข้อผิดพลาดหรือทำอะไรที่คุณต้องการเมื่อข้อมูลไม่ถูกส่งมาในฟอรม
    echo "ข้อมูลไม่ถูกส่งมาในฟอร์ม";
}
?>
