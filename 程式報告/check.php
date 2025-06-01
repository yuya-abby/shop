<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便</title>
    <style>
        body {
            background-color: #fff; 
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: rgb(255, 236, 215);
            text-align: center;
            padding: 15px;
        }

        header img {
            height: 200px;
        }

        .banner {
            background: rgb(255, 244, 180);
            text-align: right;
            padding: 8px;
            font-size: 15px;
            font-weight: bold;
        }

        .navbar table {
            width: 100%;
        }

        .navbar td {
            font-size: 20px;
        }

        h1, h3 {
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            text-align: center;
        }

        .product-section img {
            max-width: 100%;
            height: auto;
        }

        .product-section {
            margin-bottom: 30px;
        }

        .info-table {
            margin: 0 auto 20px;
            border-collapse: collapse;
        }

        .info-table td {
            padding: 8px 15px;
        }

        .submit-btn {
            background: #ff6600;
            color: white;
            padding: 10px 25px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
            font-size: 16px;
        }

        input[type="text"] {
            padding: 5px;
            width: 300px;
        }

        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>

<header>
    <img src="img/嚕嚕2.png" alt="logo">
</header>

<div class="banner">
    <div class="navbar">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"><a href="index-after.php">首頁</a></td>
                <td align="center"><a href="msg-after2.php">留言板</a></td>
                <td align="center"><a href="login.php">登出</a></td>
            </tr>
        </table>
    </div>
</div>
<?php
include "db.php";
$account = $_SESSION['account'];
$payment = $_POST['payment'] ?? '';
$address = $_POST['address'] ?? '';
$selected_ids = $_POST['selected_items'] ?? [];

if (empty($payment) || empty($address) || empty($selected_ids)) {
    echo "資料不完整，請重新填寫。";
    exit;
}

// 抓使用者姓名
$user_query = "SELECT name FROM user WHERE account = '$account'";
$user_result = mysqli_query($link, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$name = $user_data['name'] ?? '未知使用者';

// 查詢購買的商品資料
$id_list = implode(",", array_map('intval', $selected_ids));
$sql = "SELECT * FROM car WHERE id IN ($id_list)";
$res = mysqli_query($link, $sql);

$total = 0;
$product_list = [];

while ($row = mysqli_fetch_assoc($res)) {
    $product_name = $row['addproduct_name'];
    $count = $row['addproduct_count'];
    $money = $row['addproduct_money'];
    $total += $money;
    $product_list[] = $product_name . " x " . $count;
}

// 將商品列表合併成字串
$product_str = implode(", ", $product_list);

// 寫入 countmoney2 資料表
$insert_sql = "INSERT INTO countmoney2 (account, name, payment, address, total, product_list) 
               VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($link, $insert_sql);
mysqli_stmt_bind_param($stmt, "ssssis", $account, $name, $payment, $address, $total, $product_str);
$success = mysqli_stmt_execute($stmt);

if ($success) {
    // 刪除已結帳的商品
    $delete_sql = "DELETE FROM car WHERE id IN ($id_list)";
    mysqli_query($link, $delete_sql);

    echo "<h3>訂單已成立，感謝您的購買！</h3>";
    echo "<p><a href='index-after.php'>返回首頁</a></p>";
} else {
    echo "儲存失敗：" . mysqli_error($link);
}
?>

</body>
</html>
