<?php
include("db.php");

if (isset($_POST["pt_id"])) {
    $pt_id = intval($_POST["pt_id"]);

    $sql = "DELETE FROM `pro_type` WHERE `pt_id` = $pt_id";
    if (mysqli_query($link, $sql)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        // 成功後跳回首頁
        exit();
    } else {
        echo "刪除失敗：" . mysqli_error($link);
    }
} else {
    echo "未收到商品 ID（pt_id）";
}
?>