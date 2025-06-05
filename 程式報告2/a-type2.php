<?php
include("db2.php");

$img = "";
$pt_name = $_POST["pt_name"];
$pt_comment = $_POST["pt_comment"];
$pt_path = $_POST["pt_path"];
$pt_id = "";

// 處理圖片上傳
if (!empty($_FILES["img"]["name"])) {
    $pt_img = "img/" . $_FILES["img"]["name"];

    // 檢查是否上傳成功
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $pt_img)) {
        $img = $pt_img;
    } else {
        echo "圖片上傳失敗。<br>";
        var_dump($_FILES["img"]);
        exit;
    }
}

// 執行資料庫新增
$sql = "INSERT INTO `pro_type`(`img`,`pt_path`, `pt_id`, `pt_name`, `pt_comment`) 
        VALUES ('$img','$pt_path','$pt_id','$pt_name','$pt_comment')";
echo $sql;
mysqli_query($link, $sql);

// 導回前一頁
header("location: " . $_SERVER['HTTP_REFERER']);
?>