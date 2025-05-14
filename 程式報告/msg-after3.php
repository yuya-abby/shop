<?php
include("db.php");

$title = $_POST["title"];
$text = $_POST["text"];
$account = $_SESSION["account"];

$targetDir = "msgimg/"; // 要儲存圖片的資料夾

// 確保資料夾存在
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

// 檢查是否為圖片
$check = getimagesize($_FILES["img"]["tmp_name"]);
if ($check === false) {
    echo "檔案不是圖片。";
    exit;
}

// 限制檔案大小 (最大 2MB)
if ($_FILES["img"]["size"] > 2000000) {
    echo "檔案太大。";
    exit;
}

// 檢查副檔名
$imageFileType = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));
$allowedTypes = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedTypes)) {
    echo "只允許 JPG, JPEG, PNG, GIF 格式。";
    exit;
}

//  建立不重複檔名（時間戳 + 隨機數）
$uniqueName = date("YmdHis") . '_' . rand(1000, 9999) . '.' . $imageFileType;
$targetFile = $targetDir . $uniqueName;

// 嘗試移動檔案
if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {

   $sql="INSERT INTO `msg`(`id`, `account`, `title`, `text`, `img`, `add_time`, `up_time`)VALUES (null,'$account','$title','$text','$uniqueName',NOW(),null)";
    mysqli_query($link, $sql);
   echo "<script> location.href='msg-after2.php'</script>;";

} else {
    echo "檔案上傳失敗。";
}
?>