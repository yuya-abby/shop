<?php
include "db.php";
$account = $_SESSION["account"];

// 完成訂單邏輯
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['complete_order_id'])) {
    $id = intval($_POST['complete_order_id']);
    $update_sql = "UPDATE countmoney SET status = '已完成' WHERE id = $id AND account = '$account'";
    mysqli_query($link, $update_sql);
}

$sql = "SELECT * FROM countmoney WHERE account = '$account' ORDER BY order_date DESC LIMIT 10";
$res = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便</title>
    <style>
        body {
            font-family: Arial;
            background-color:rgb(255, 255, 255);
        }
        header {
            background-color:rgb(255, 236, 215);
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 30px;
        }
        header img {
            height: 200px;
        }
        .banner {
            background:rgb(255, 244, 180);
            text-align: right;
            padding: 8px;
            font-size: 15px;
            font-weight: bold;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }
        .product {
            background: white;
            margin: 10px;
            padding: 15px;
            width: 250px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product img {
            width: 100%;
            border-radius: 5px;
        }
        .product h3 {
            font-size: 20px;
            margin: 20px;
        }
        .product p {
            color: #888;
        }
        .button {
            display: inline-block;
            background: #ff6600;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }
        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }
        a {
            text-decoration: none;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
        }
        th {
            background-color: #f9d493;
        }
        td {
            padding: 10px;
            text-align: center;
        }
        input[type="text"] {
            font-size: 16px;
        }
        .btn-complete {
            background-color: #28a745;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-complete:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
    </header>
    <div class="banner">
        <div class="navbar">
            <form action="" method="get">
                <table cellspacing="0" cellpadding="0" style="width:100%; margin: 0px;">
                    <tr>
                        <td style="width: 200px; font-size:20px;" align="center"><a href="index-after.php">首頁</a></td>
                        <td align="right">
                            <input type="text" name="keyword" placeholder="輸入商品名稱搜尋"
                                   value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"
                                   style="width:200px; font-size:18px;">
                            <button type="submit" style="width:100px; font-size:18px;">搜尋🔍</button>
                        </td>
                        <td align="center" style="width:100px; font-size:20px;"><a href="car.php">購物車</a></td>
                        <td align="center" style="width:100px; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
                        <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <h1>您的訂單明細</h1>
    <table>
        <tr>
            <th>商品圖片</th>
            <th>名稱</th>
            <th>單價</th>
            <th>數量</th>
            <th>總價</th>
            <th>付款方式</th>
            <th>訂購時間</th>
            <th>帳號</th>
            <th>狀態</th>
            <th>操作</th>
        </tr>
        <?php
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>
                        <td><img src='{$row['img']}' height='100'></td>
                        <td>{$row['c_name']}</td>
                        <td>NT$ {$row['price']}</td>
                        <td>{$row['quantity']}</td>
                        <td>NT$ {$row['subtotal']}</td>
                        <td>{$row['payment_method']}</td>
                        <td>{$row['order_date']}</td>
                        <td>{$row['account']}</td>
                        <td>{$row['status']}</td>
                        <td>";
                if ($row['status'] !== '已完成') {
                    echo "<form method='POST' style='display:inline;'>
                            <input type='hidden' name='complete_order_id' value='{$row['id']}'>
                            <button type='submit' class='btn-complete'>完成訂單</button>
                          </form>";
                } else {
                    echo "-";
                }
                echo "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='10'>尚無訂單紀錄。</td></tr>";
        }
        ?>
    </table>
</body>
</html>