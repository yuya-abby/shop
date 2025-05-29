<?php
include "db.php";

// 驗證與接收資料（使用 POST 更安全）
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("請使用正確的提交方式");
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
$payment_method = isset($_POST['payment']) ? $_POST['payment'] : '';
$account = $_SESSION['account'];

// 確保資料合法
if ($id <= 0 || $quantity <= 0 || empty($payment_method)) {
    die("資料不完整或錯誤");
}

// 查詢商品資料
$sql = "SELECT * FROM `addproduct` WHERE `id` = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $img = $row['img'];
    $name = $row['name'];
    $price = (int)$row['money'];
    $subtotal = $price * $quantity;

    // 插入訂單資料
    $insert_sql = "INSERT INTO `countmoney` 
        (`account`, `c_id`, `img`, `quantity`, `c_name`, `price`, `subtotal`, `payment_method`, `order_date`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())";

    $insert_stmt = mysqli_prepare($link, $insert_sql);
    mysqli_stmt_bind_param($insert_stmt, "sisssiis", 
        $account, $id, $img, $quantity, $name, $price, $subtotal, $payment_method
    );

    if (mysqli_stmt_execute($insert_stmt)) {
        echo "<script>alert('新增成功'); location.href='check.php?id=$id';</script>";
    } else {
        echo "新增失敗：" . mysqli_error($link);
    }
} else {
    echo "找不到該商品資料。";
}
?>
