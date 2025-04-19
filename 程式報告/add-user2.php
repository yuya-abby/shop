<?php
include ("db.php");
$account=$_POST["account"];  //接收資料
$password=$_POST["password"];
$name=$_POST["name"];
$type=$_POST["type"];

$sql="INSERT INTO `user`(`id`, `account`, `password`, `name`, `type`)
 VALUES (null,'$account','$password','$name','$type')";
$res=mysqli_query($link,$sql);
echo "<script> location.href='login.php'</script>;";
?>