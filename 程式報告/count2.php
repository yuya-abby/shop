<?php
include ("db.php");
$account=$_GET["account"];  //接收資料
$name=$_GET["name"];
$email=$_GET["email"];
$phone=$_GET["phone"];
$payment=$_GET["payment"];

$sql="INSERT INTO `countmoney`(`id`, `img`, `name`, ` quantity`, `c_money`, `money`, `payment`) 
VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]'))";
$res=mysqli_query($link,$sql);
echo "<script> location.href='check.php'</script>;";
?>
