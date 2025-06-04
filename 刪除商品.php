<?php
include("db.php");

if (isset($_POST["c_id"])) {
    $c_id = intval($_POST["c_id"]);

    $sql = "DELETE FROM `aa` WHERE `c_id` = $c_id";
    if (mysqli_query($link, $sql)) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        // 成功後跳回首頁
        exit();
    } else {
        echo "刪除失敗：" . mysqli_error($link);
    }
} else {
    echo "未收到商品 ID（c_id）";
}
?>
