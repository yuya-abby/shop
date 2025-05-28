<?php
include ("db.php");

$img="";
$pt_name=$_POST["pt_name"];
$pt_comment=$_POST["pt_comment"];
$pt_id="";
$pt_path="";
 if (isset($_POST["action"])&&($_POST["action"])=="update"){

 }
if(!empty($_FILES["img"]["name"])){
    $pt_img="img/" . $_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_name"], $pt_img);
}

$sql="INSERT INTO `pro_type`(`img`,`pt_path`, `pt_id`, `pt_name`, `pt_comment`) 
VALUES ('$img','$pt_path','$pt_id','$pt_name','$pt_comment')";
echo $sql;
mysqli_query($link,$sql);

header("Location: " . $_SERVER['HTTP_REFERER']);
?>