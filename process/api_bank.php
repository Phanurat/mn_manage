<?php
include "connect.php";

$Name = "TEST_BANK";

$sql = "ALTER TABLE `transcation` ADD COLUMN $Name INT;";

if ($conn->query($sql) === TRUE) {
    echo "Saved!!!";
    header("Location: ../dashboard.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
