<?php
include "db.php";
session_start();

// 取得購物車資料
$account = $_SESSION["account"];
$payment_method = $_POST["payment"];
$quantities = $_POST["quantity"];

// 依序儲存到資料庫
foreach ($quantities as $c_id => $quantity) {
    // 取得商品資訊
    $sql = "SELECT `money`, `name` FROM `addproduct` WHERE `id`='$c_id'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($res);

    $price = $row["money"];
    $name = $row["name"];
    $subtotal = $price * $quantity;

    // 插入訂單資料到資料庫
    $insert_sql = "INSERT INTO `countmoney` (`account`, `c_id`, `c_name`, `quantity`, `price`, `subtotal`, `payment_method`, `order_date`)
                   VALUES ('$account', '$c_id', '$name', '$quantity', '$price', '$subtotal', '$payment_method', NOW())";
    
    if (!mysqli_query($link, $insert_sql)) {
        echo "錯誤：" . mysqli_error($link);
    }
}

// 完成後跳轉到確認頁
header("Location: check.php");
exit();
?>
