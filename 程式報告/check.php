<?php
session_start();
include "db.php";

$account = $_SESSION['account'];
$payment = $_POST['payment'];
$address = $_POST['address'];
$selected_ids = $_POST['selected_items'];

if (empty($selected_ids) || empty($payment) || empty($address)) {
    echo "資料不完整，請返回重試。";
    exit;
}

// 將勾選的商品從購物車 car 表查出來
$id_list = implode(",", array_map('intval', $selected_ids));
$sql = "SELECT * FROM car WHERE id IN ($id_list)";
$res = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($res)) {
    $name = $row['addproduct_name'];
    $count = $row['addproduct_count'];
    $price = $row['addproduct_money'] / $count;
    $subtotal = $row['addproduct_money'];
    $img = $row['addproduct_img'];

    // 寫入訂單資料表 countmoney（加上 address 欄位）
    $insert = "INSERT INTO countmoney 
        (c_name, price, quantity, subtotal, payment_method, order_date, account, img, status, address) 
        VALUES 
        ('$name', '$price', '$count', '$subtotal', '$payment', NOW(), '$account', '$img', '處理中', '$address')";
    mysqli_query($link, $insert);
}

// 刪除購物車中已購買的項目
$delete = "DELETE FROM car WHERE id IN ($id_list)";
mysqli_query($link, $delete);

// 導向到訂單成功頁面
header("Location: finish.php");
exit;
?>
