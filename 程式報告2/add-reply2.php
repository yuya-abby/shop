<?php
include("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 確保登入帳號存在
    if (!isset($_SESSION['account'])) {
        echo "請先登入。";
        exit();
    }

    $parent_id = isset($_POST['parent_id']) ? intval($_POST['parent_id']) : 0;
    $account = $_SESSION['account'];
    $text = trim($_POST['text']);
    $now = date('Y-m-d H:i:s');

    if ($text === '') {
        echo "回覆內容不能為空。";
        exit();
    }

    // 使用 prepared statement 防止 SQL Injection
    $stmt = $link->prepare("INSERT INTO msg (account, text, parent_id, add_time) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $account, $text, $parent_id, $now);

    if ($stmt->execute()) {
        header("Location: msg-seller2.php");
        exit();
    } else {
        echo "回覆失敗：" . $stmt->error;
    }

    $stmt->close();
}
?>
