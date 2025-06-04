<?php
include ("db.php");
$id= $_POST['id'];
$name = $_POST['name'];
$total = $_POST['total'];
$productList = $_POST['product_list'];
$orderDate = $_POST['order_date'];
$account  = $_POST['account'];
$payment = $_POST['payment'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$quantity   =$POST['quantity'];

$sql = "INSERT INTO `countmoney2`(`id`, `name`, `total`, `quantity`, `subtotal`, `product_list`, `order_date`, `account`, `payment`, `status`, `address`, `phone`,`comm_id`,`comm_name`) 
VALUES ('$
','$name','$total','$quantity','$subtotal','$product_list','$order_date','$account','$payment','$status','$address','$phone')";
echo $sql;
mysqli_query($link,$sql);



?>