<?php
include("db.php");

$c_id = $_GET["c_id"] ?? '';

if ($c_id) {
    // 使用 prepared statement 避免 SQL injection
    $stmt = $link->prepare("DELETE FROM `aa` WHERE `c_id` = ?");
    $stmt->bind_param("i", $c_id); // 假設 c_id 是整數
    $stmt->execute();
    $stmt->close();
}

echo "<script>location.href='a-commodity.php';</script>";
?>
