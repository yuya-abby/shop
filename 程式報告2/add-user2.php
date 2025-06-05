<?php
include("db.php");

// 用 POST 方式取得資料
$account = $_POST["account"] ?? '';
$password = $_POST["password"] ?? '';
$password2 = $_POST["password2"] ?? '';
$name = $_POST["name"] ?? '';
$email = $_POST["email"] ?? '';
$phone = $_POST["phone"] ?? '';
$type = $_POST["type"] ?? '';

// 密碼確認
if ($password !== $password2) {
    echo "<script>alert('密碼與確認密碼不一致'); location.href='add-user.php';</script>";
    exit;
}

// 欄位不空判斷
if (!$account || !$password || !$name || !$email || !$phone || !$type) {
    echo "<script>alert('註冊錯誤（所有欄位都必須填寫）'); location.href='add-user.php';</script>";
    exit;
}

// 檢查帳號是否已存在
$stmt = $link->prepare("SELECT * FROM user WHERE account = ?");
$stmt->bind_param("s", $account);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "<script>alert('此帳號已被註冊，請換一個帳號'); location.href='add-user.php';</script>";
    exit;
}
$stmt->close();

// 密碼加密
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// 新增帳號
$stmt = $link->prepare("INSERT INTO user (account, password, name, email, phone, type) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $account, $password, $name, $email, $phone, $type);
if ($stmt->execute()) {
    echo "<script>alert('註冊成功！請登入'); location.href='login.php';</script>";
} else {
    echo "<script>alert('註冊失敗，請稍後再試'); location.href='add-user.php';</script>";
}
$stmt->close();
?>
