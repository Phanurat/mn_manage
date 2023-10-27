<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include "connect.php";

    session_start();
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT SUM(money) AS total_income FROM transcation WHERE type = 'income' AND user_id = SHA2('$user_id', 256)";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total_income = $row["total_income"];
        echo json_encode(array("total_income" => $total_income));
    } else {
        echo json_encode(array("error" => "ไม่พบข้อมูลรายได้ของผู้ใช้นี้"));
    }
?>
