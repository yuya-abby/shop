<?php
include ("db.php");

$c_img="";
$c_name=$_POST["c_name"];
$c_text=$_POST["c_text"];
$c_money=$_POST["c_money"];
$pt_id=$_POST["pt_id"];
$pt_name=$_POST["pt_name"];
$c_id="";

 if (isset($_POST["action"])&&($_POST["action"])=="update"){

 } 
if(!empty($_FILES["img"]["name"])){
    $c_img="img/" . $_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_name"], $c_img);
}

$sql="INSERT INTO `aa`(`c_id`, `c_name`, `c_text`, `c_money`, `c_img`,`pt_id`,`pt_name`) 
VALUES ('$c_id','$c_name','$c_text','$c_money','$c_img','$pt_id','$pt_name')";
echo $sql;
mysqli_query($link,$sql);

header("Location: " . $_SERVER['HTTP_REFERER']);
?>