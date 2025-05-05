<?php
include ("db.php");
$account=$_GET["account"];  //接收資料
$password=$_GET["password"];
$name=$_GET["name"];
$email=$_GET["email"];
$phone=$_GET["phone"];
$type=$_GET["type"];

$sql="INSERT INTO `user`(`id`, `account`, `password`, `name`, `email`, `phone`,`type`)
 VALUES (null,'$account','$password','$name','$email','$phone','u')";
$res=mysqli_query($link,$sql);
echo "<script> location.href='login.php'</script>;";
?>