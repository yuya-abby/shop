<?php
include("db.php");

$id = $_POST['id'];
$status = $_POST['status'];

$sql = "UPDATE `countmoney2` SET `status`='$status' WHERE `id`='$id'";
mysqli_query($link, $sql);

header("Location: 接收商品資訊.php"); // 成功後導回訂單管理畫面
exit();
?>
