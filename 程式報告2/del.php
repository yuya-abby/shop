<?php
include("db.php");

// 檢查是否登入
if (!isset($_SESSION["account"])) {
    echo "請先登入。";
    exit;
}

if (!isset($_GET["id"])) {
    echo "缺少留言 ID。";
    exit;
}

$id = intval($_GET["id"]);
$account = $_SESSION["account"];

// 先檢查留言是否存在，並確認是該使用者的留言（或是管理員）
$stmt = $link->prepare("SELECT account FROM msg WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    echo "留言不存在。";
    exit;
}

$stmt->bind_result($msg_owner);
$stmt->fetch();
$stmt->close();

// 檢查刪除權限（可根據需要允許管理者刪所有留言）
if ($msg_owner !== $account /* && $_SESSION["role"] !== "admin" */) {
    echo "無權刪除此留言。";
    exit;
}

// 執行刪除
$delete_stmt = $link->prepare("DELETE FROM msg WHERE id = ?");
$delete_stmt->bind_param("i", $id);
$delete_stmt->execute();
$delete_stmt->close();

// 成功後跳轉
header("Location: msg-after2.php");
exit;
?>
