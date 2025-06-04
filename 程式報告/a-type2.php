<?php
include("db.php");

$img = "";
$pt_name = $_POST["pt_name"];
$pt_comment = $_POST["pt_comment"];
$pt_path = $_POST["pt_path"];
$pt_id = "";

// 執行資料庫新增
$sql = "INSERT INTO `pro_type`(`img`,`pt_path`, `pt_id`, `pt_name`, `pt_comment`) 
        VALUES ('$img','$pt_path','$pt_id','$pt_name','$pt_comment')";
echo $sql;
mysqli_query($link, $sql);

// 導回前一頁
header("Location: " . $_SERVER['HTTP_REFERER']);
?>