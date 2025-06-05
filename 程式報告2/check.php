<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便</title>
    <style>
body {
    font-family: Arial, sans-serif;      /* 使用 Arial 無襯線字體 */
    background: #fff;                    /* 背景為白色 */
    text-align: center;                  /* 全站文字置中 */
    margin: 0;                           /* 移除頁面邊界空隙 */
    padding: 0;                          /* 移除頁面內距 */
}

header {
    background-color: rgb(255, 236, 215);/* 淺橘色背景 */
    padding: 15px;                       /* 內距 15px */
}

header img {
    height: 200px;                       /* LOGO 高度為 200px */
}

.banner {
    background: rgb(255, 244, 180);      /* 淡黃色背景橫幅 */
    padding: 10px 20px;                  /* 上下 10px、左右 20px 的內距 */
    font-size: 15px;                     /* 字體大小 15px */
    font-weight: bold;                   /* 文字加粗 */
}

.navbar table {
    width: 100%;                         /* 導覽列使用 table 滿版寬度 */
    border-collapse: collapse;          /* 表格邊框合併 */
}

.navbar td {
    padding: 5px 10px;                   /* 表格儲存格內距 */
    vertical-align: middle;             /* 垂直置中 */
}

.navbar a {
    text-decoration: none;              /* 移除超連結底線 */
    font-size: 18px;                    /* 連結文字大小 */
}

.navbar input[type="text"] {
    width: 200px;                       /* 搜尋欄寬度 */
    font-size: 18px;                    /* 文字大小 */
    padding: 5px;                       /* 內距 */
}

.navbar button {
    width: 100px;                       /* 按鈕寬度 */
    font-size: 18px;                    /* 字體大小 */
    padding: 5px;                       /* 內距 */
    margin-left: 5px;                   /* 與搜尋欄間距 */
    cursor: pointer;                    /* 滑鼠變手型 */
}

.message {
    margin-top: 50px;                   /* 與上方內容間距 */
}

.btn {
    margin-top: 20px;                   /* 與上方內容間距 */
    display: inline-block;              /* 內聯區塊元素 */
    padding: 10px 20px;                 /* 按鈕內距 */
    background-color: #ff6600;          /* 橘色背景 */
    color: white;                       /* 白色文字 */
    text-decoration: none;              /* 無底線 */
    border-radius: 5px;                 /* 圓角按鈕 */
}

a {
    text-decoration: none;              /* 移除底線 */
    font-size: 18px;                    /* 字體大小 */
    color: black;                       /* 黑色文字 */
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
                    <td style="width:100px; font-size:20px;" align="center"><a href="car.php">購物車</a></td>
                    <td style="width:100px; font-size:20px;" align="center"><a href="check-a.php">購物清單</a></td>
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
    <div class="banner" 
    style="position: fixed; 
    bottom: 0; 
    left: 0; 
    width: 100%; 
    background-color: rgb(255, 244, 180);
    text-align: center; 
    padding: 10px; 
    font-size: 18px; 
    font-weight: normal; 
    z-index: 999;">
    嚕嚕咪賣貨便
</div>

</body>
</html>
