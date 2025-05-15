<?php
include ("db.php");

$img="";
$c_name=$_POST["c_name"];
$c_text=$_POST["c_text"];
$c_money=$_POST["c_money"];

 if (isset($_POST["action"])&&($_POST["action"])=="update"){

 }
if(!empty($_FILES["img"]["name"])){
    $img="img/" . $_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_name"], $img);
}

$sql="INSERT INTO `comm`(`id`, `c_name`, `c_money`, `img`, `c_text`) VALUES (null,'$c_name','$c_money','$img','$c_text')";
echo $sql;
mysqli_query($link,$sql);
header("location:口紅賣家首頁.php")
//echo "<script> location.href='口紅賣家首頁.php'</script>;";
?>