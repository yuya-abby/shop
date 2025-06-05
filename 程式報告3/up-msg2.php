<?php
include("db.php");

// 取得表單資料
$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];
$add_time = $_POST['add_time']; // 沿用舊時間
$up_time = date("Y-m-d H:i:s"); // 當前時間
$account = $_SESSION["account"];

// 取得舊圖片名稱
$sql_select = "SELECT img FROM msg WHERE id = ?";
$stmt = mysqli_prepare($link, $sql_select);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
$old_img = $row['img'];

// 圖片處理
$new_img_name = $old_img; // 預設使用原圖
if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
    $ext = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
    $new_img_name = date("YmdHis") . rand(1000, 9999) . "." . $ext;
    move_uploaded_file($_FILES['img']['tmp_name'], "msgimg/" . $new_img_name);

    // 刪除舊圖（存在才刪）
    if ($old_img && file_exists("msgimg/" . $old_img)) {
        unlink("msgimg/" . $old_img);
    }
}

// 更新資料庫
$sql_update = "UPDATE msg SET title=?, text=?, img=?, add_time=?, up_time=? WHERE id=?";
$stmt = mysqli_prepare($link, $sql_update);
mysqli_stmt_bind_param($stmt, "sssssi", $title, $text, $new_img_name, $add_time, $up_time, $id);
mysqli_stmt_execute($stmt);

// 根據使用者帳號找對應身份並導向
$sql_user = "SELECT `type` FROM `user` WHERE `account` = ?";
$stmt = mysqli_prepare($link, $sql_user);
mysqli_stmt_bind_param($stmt, "s", $account);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $type = $row["type"];
    if ($type === 'a') {
        header("Location: msg-after2.php");
        exit;
    } elseif ($type === 'u') {
        header("Location: msg-after2.php");
        exit;
    } else {
        header("Location: msg-after2.php");
        exit;
    }
} else {
    // 找不到帳號，導回登入頁
    header("Location: login.php");
    exit;
}
?>
