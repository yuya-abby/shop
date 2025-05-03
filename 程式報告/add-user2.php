<?php
include ("db.php");
$account=$_POST["account"];  //接收資料
$password=$_POST["password"];
$name=$_POST["name"];
$email=$_POST["email"];
$phone=$_POST["phone"];
$type=$_POST["type"];

$sql="INSERT INTO `user`(`id`, `account`, `password`, `name`, `email`, `phone`,`type`)
 VALUES (null,'$account','$password','$name','$email','$phone','u')";
$res=mysqli_query($link,$sql);
echo "<script> location.href='login.php'</script>;";
?>