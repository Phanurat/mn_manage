<?php
if (isset($_POST['user_id']) && isset($_POST['user_name'])) {
    // รับข้อมูลจากฟอร์ม
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $list_name = $_POST['list_name'];
    $money = $_POST['money'];
    $type = $_POST['type'];

    // สร้าง JSON object
    $data = array(
        'user_id' => $user_id,
        'user_name' => $user_name,
        'transactions' => array(
            array('list_name' => $list_name, 'money' => $money, 'type' => $type)
        )
    );

    // แปลง JSON object เป็น JSON string
    $json_data = json_encode($data);


    // รับวันที่และเวลาปัจจุบัน
    date_default_timezone_set('Asia/Bangkok');  
    $current_datetime = date('Y-m-d-H-i-s');

    // ระบุไฟล์ที่คุณต้องการบันทึก JSON string
    $filename = '../json/'. $current_datetime . '-' . $user_id . '.json';

    // บันทึก JSON string ลงในไฟล์
    file_put_contents($filename, $json_data);
    
    echo "ข้อมูลถูกบันทึกเป็น JSON ในไฟล์ $filename";
} else {
    // แสดงข้อความข้อผิดพลาดหรือทำอะไรที่คุณต้องการเมื่อข้อมูลไม่ถูกส่งมาในฟอรม
    echo "ข้อมูลไม่ถูกส่งมาในฟอร์ม";
}
?>
