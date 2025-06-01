<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    die("請使用正確的提交方式");
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;
$payment_method = isset($_POST['payment']) ? $_POST['payment'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$account = $_SESSION['account'];

if ($id <= 0 || $quantity <= 0 || empty($payment_method) || empty($account)) {
    die("資料不完整或錯誤");
}

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

    $insert_sql = "INSERT INTO `countmoney2` 
        (`id`, `c_name`, `price`, `quantity`, `subtotal`, `img`, `order_date`, `account`, `payment_method`, `status`, `address`) 
        VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?)";

    $insert_stmt = mysqli_prepare($link, $insert_sql);
    mysqli_stmt_bind_param($insert_stmt, "sisssiiss", 
        $id, $c_name, $price, $quantity, $subtotal, $img, $account, $payment_method, $address
    );

    if (mysqli_stmt_execute($insert_stmt)) {
        echo "<script>alert('購買成功'); location.href='finish.php';</script>";
    } else {
        echo "新增失敗：" . mysqli_error($link);
    }
} else {
    echo "找不到該商品資料。";
}
?>
