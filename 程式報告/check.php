<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: rgb(255, 236, 215);
            padding: 15px;
        }
        header img {
            height: 200px;
        }
        .banner {
            background: rgb(255, 244, 180);
            padding: 10px 20px;
            font-size: 15px;
            font-weight: bold;
        }
        .navbar table {
            width: 100%;
            border-collapse: collapse;
        }
        .navbar td {
            padding: 5px 10px;
            vertical-align: middle;
        }
        .navbar a {
            text-decoration: none;
            font-size: 18px;
        }
        .navbar input[type="text"] {
            width: 200px;
            font-size: 18px;
            padding: 5px;
        }
        .navbar button {
            width: 100px;
            font-size: 18px;
            padding: 5px;
            margin-left: 5px;
            cursor: pointer;
        }
        .message {
            margin-top: 50px;
        }
        .btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a {
            text-decoration: none;
            font-size: 18px;
            color:black;
        }
    </style>
</head>
<body>

<?php include "db.php"; ?>

<header>
    <img src="img/嚕嚕2.png" style="width:60%;">
</header>

<div class="banner">
    <div class="navbar">
            <table>
                <tr>
                    <td style="width:100px; font-size:20px;" align="center"><a href="index-after.php">首頁</a></td>
                    <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                    <td style="width:100px; font-size:20px;" align="center"><a href="car.php">購物車</a></td>
                    <td style="width:100px; font-size:20px;" align="center"><a href="msg-after2.php">留言板</a></td>
                    <td style="width:100px; font-size:20px;" align="center"><a href="login.php">登出</a></td>
                </tr>
            </table>
    </div>
</div>
<?php
$account = $_SESSION['account'];
$payment = $_POST['payment'] ?? '';
$address = $_POST['address'] ?? '';
$phone = $_POST['phone'] ?? '';
$selected_ids = $_POST['selected_items'] ?? [];

if (empty($payment) || empty($address) || empty($phone) || empty($selected_ids)) {
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
$insert_sql = "INSERT INTO countmoney2 (account, name, payment, address, total, product_list, phone) 
               VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($link, $insert_sql);
mysqli_stmt_bind_param($stmt, "ssssiss", $account, $name, $payment, $address, $total, $product_str, $phone);
$success = mysqli_stmt_execute($stmt);

if ($success) {
    // 刪除已結帳的商品
    $delete_sql = "DELETE FROM car WHERE id IN ($id_list)";
    mysqli_query($link, $delete_sql);

    echo "<h3>訂單已成立，感謝您的購買！</h3>";
    echo "<p><a href='index-after.php' class='btn'>返回首頁</a></p>";
} else {
    echo "儲存失敗：" . mysqli_error($link);
}
?>


</body>
</html>
