<?php

include("db.php");

if (!isset($_SESSION["account"])) {
    echo "未登入使用者";
    exit;
}

$account = $_SESSION["account"];
$title = $_POST["title"];
$text = $_POST["text"];
$targetDir = "msgimg/";

if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if (!isset($_FILES["img"]) || $_FILES["img"]["error"] !== UPLOAD_ERR_OK) {
    echo "圖片上傳失敗或未選擇圖片。";
    exit;
}

$check = getimagesize($_FILES["img"]["tmp_name"]);
if ($check === false) {
    echo "檔案不是圖片。";
    exit;
}

if ($_FILES["img"]["size"] > 2000000) {
    echo "檔案太大。";
    exit;
}

$imageFileType = strtolower(pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION));
$allowedTypes = ["jpg", "jpeg", "png", "gif"];
if (!in_array($imageFileType, $allowedTypes)) {
    echo "只允許 JPG, JPEG, PNG, GIF 格式。";
    exit;
}

$uniqueName = date("YmdHis") . '_' . rand(1000, 9999) . '.' . $imageFileType;
$targetFile = $targetDir . $uniqueName;

if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFile)) {
    $stmt = $link->prepare("INSERT INTO `msg`(`account`, `title`, `text`, `img`, `add_time`, `up_time`) VALUES (?, ?, ?, ?, NOW(), NULL)");
    $stmt->bind_param("ssss", $account, $title, $text, $uniqueName);
    $stmt->execute();
    $stmt->close();
    header("Location: msg-after2.php");
    exit;
} else {
    echo "檔案上傳失敗。";
}
?>
