<?php
include "db.php";

$buy_count = intval($_POST['buy_count']);
$name = $_POST['addproduct_name'];
$img = $_POST['addproduct_img'];
$money = floatval($_POST['addproduct_money']);
$product_id = intval($_POST['addproduct_id']);
$total = $money * $buy_count;
$acc = isset($_SESSION['account']) ? $_SESSION['account'] : 'guest';

$sql = "INSERT INTO `car` (
    `id`, `addproduct_id`, `addproduct_name`, `addproduct_money`, 
    `addproduct_count`, `addproduct_img`, `acc`, `price`, `quantity`, `added_date`
) VALUES (
    NULL, ?, ?, ?, ?, ?, ?, ?, ?, NOW()
)";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "isdisssd", 
    $product_id, $name, $money, $buy_count, $img, $acc, $total, $buy_count
);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("location: car.php");
exit;
?>
