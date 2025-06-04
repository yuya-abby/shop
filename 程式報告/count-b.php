
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>訂單確認</title>
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
$account = $_POST['account'];
$name = $_POST['buyer_name'];
$payment = $_POST['payment'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$c_id = $_POST['c_id'];
$product_name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$total = $price * $quantity;
$product_list = $product_name . " x " . $quantity;
$sql = "INSERT INTO countmoney2 (account, name, payment, address, total, product_list, phone) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "ssssiss", $account, $name, $payment, $address, $total, $product_list, $phone);
$success = mysqli_stmt_execute($stmt);
?>

<div class="message">
    <?php if ($success): ?>
        <h3>訂單已成立，感謝您的購買！</h3>
        <p>商品：<?= $product_list ?></p>
        <p>總金額：NT$<?= number_format($total, 2) ?></p>
        <a href="index-after.php" class="btn">返回首頁</a>
    <?php else: ?>
        <h3>訂單儲存失敗，請稍後再試。</h3>
        <p><?= mysqli_error($link) ?></p>
    <?php endif; ?>
</div>

</body>
</html>
