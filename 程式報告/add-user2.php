<?php
include("db.php");

$account = $_GET["account"] ?? '';
$password = $_GET["password"] ?? '';
$password2 = $_GET["password2"] ?? '';
$name = $_GET["name"] ?? '';
$email = $_GET["email"] ?? '';
$phone = $_GET["phone"] ?? '';
$type = $_GET["type"] ?? '';

if ($password !== $password2) {
    echo "<script>alert('密碼與確認密碼不一致'); location.href='login.php';</script>";
    exit;
}

if ($account && $password && $name && $email && $phone && $type) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $link->prepare("INSERT INTO `user` (`account`, `password`, `name`, `email`, `phone`, `type`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $account, $password, $name, $email, $phone, $type);

    if ($stmt->execute()) {
        echo "<script>location.href='login.php';</script>";
    } else {
        echo "<script>alert('註冊失敗，帳號可能已存在'); location.href='login.php';</script>";
    }

    $stmt->close();
} else {
    echo "<script>alert('註冊錯誤（所有欄位都必須填寫）'); location.href='login.php';</script>";
}
?>
