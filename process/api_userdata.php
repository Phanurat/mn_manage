<?php
    include "connect.php";

    // เรียกใช้ค่า user_id จาก session
    session_start();
    $user_id = $_SESSION['user_id'];

    // ใช้ค่า user_id ในคำสั่ง SQL
    $sql = "SELECT money FROM transcation WHERE type = 'income' AND user_id = SHA2('$user_id', 256)";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // มีข้อมูลในผลลัพธ์
        while ($row = $result->fetch_assoc()) {
            echo "จำนวนเงิน: " . $row["money"] . "<br>";
        }
    } else {
        echo "ไม่พบข้อมูลรายได้ของผู้ใช้นี้";
    }
?>
