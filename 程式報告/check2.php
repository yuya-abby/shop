<?php
include ("db.php");
$c_name=$_POST["c_name"];
$address=$_POST["address"];
$remark=$_POST["remark"];
$quantity=$_POST["quantity"];
$money=$_POST["money"];
$img="";

if(!empty($_FILES["img"]["c_name"])){
    $img="img/" . $_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_name"], $img);
}
$sql="INSERT INTO `checkthing`(`id`, `c_name`, `address`, `remark`, `quantity`, `money`, `img`) 
VALUES (null,'$c_name','$address','$remark','$quantity','$money','$img')";

$res=mysqli_query($link,$sql);


?>