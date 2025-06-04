<?php
include("db.php");

// 檢查是否有傳入 c_id，避免未定義錯誤
if (isset($_GET["c_id"])) {
    $c_id = $_GET["c_id"];

    // 使用 prepared statement 可防止 SQL Injection
    $stmt = $link->prepare("DELETE FROM `aa` WHERE `c_id` = ?");
    $stmt->bind_param("s", $c_id);

    if ($stmt->execute()) {
        echo "<script>alert('商品已刪除'); location.href='a-commodity.php';</script>";
    } else {
        echo "<script>alert('刪除失敗'); location.href='a-commodity.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('未指定要刪除的商品'); location.href='a-commodity.php';</script>";
}
?>
