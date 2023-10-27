<?php
    include "connect.php";

    session_start();
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT SUM(money) AS total_income FROM transcation WHERE type = 'income' AND user_id = SHA2('$user_id', 256)";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "รายได้รวม: " . $row["total_income"];
        }
    } else {
        echo "ไม่พบข้อมูลรายได้ของ 'Phanurat'";
    }


?>