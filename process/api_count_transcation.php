<?php
include "connect.php";
$user_id = $_SESSION['user_id'];

$sql = "SELECT COUNT(`transcation_id`) as `List Transcation` FROM `transcation` WHERE `user_id` = SHA2('$user_id', 256)";

$result = $conn->query($sql);

/*if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $listTranscation = $row['List Transcation'];
    echo "จำนวนรายการที่ตรงกับเงื่อนไข: $listTranscation";
} else {
    echo "ไม่พบรายการที่ตรงกับเงื่อนไข";
}*/

?>