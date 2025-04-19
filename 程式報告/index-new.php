<?php
include ("db.php");
$img="";
$money=$_POST["money"];

$sql="INSERT INTO `addproduct`(`id`, `img`, `money`) VALUES (null,'$img','$money')";
$res=mysqli_query($link,$sql);

?>