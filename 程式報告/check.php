<?php
include "db.php";
$account = $_SESSION["account"];
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
            background-color: rgb(255, 255, 255);
            padding: 20px;
        }

        header {
            background-color: rgb(255, 236, 215);
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 30px;
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
            font-size: 18px;
            padding: 10px;
        }

        a {
            text-decoration: none;
            color: black;
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

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f9d493;
        }

        .btn-complete {
            background-color: #28a745;
            color: white;
            padding: 5px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-complete:hover {
            background-color: #218838;
        }

        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }

        input[type="text"] {
            font-size: 16px;
            padding: 5px;
        }

        button {
            font-size: 16px;
            padding: 5px 10px;
        }
    </style>
</head>
<body>

<header>
    <img src="img/嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>

<div class="banner">
    <div class="navbar">
        <form method="GET" action=".php">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width: 200px; text-align: center;"><a href="index-after.php">首頁</a></td>
                    <td style="text-align: right;">
                        <input type="text" name="keyword" placeholder="輸入商品名稱搜尋" 
                               value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" 
                               style="width:200px;">
                        <button type="submit">搜尋🔍</button>
                    </td>
                    <td style="width: 100px; text-align: center;"><a href="car.php">購物車</a></td>
                    <td style="width: 100px; text-align: center;"><a href="msg-after2.php">留言板</a></td>
                    <td style="width: 100px; text-align: center;"><a href="login.php">登出</a></td>
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
                echo "<form action='check2.php' method='POST' style='margin:0;'>
                        <input type='hidden' name='order_id' value='{$row['id']}'>
                        <input type='submit' class='btn-complete' value='完成訂單'>
                      </form>";
            } else {
                echo "—";
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
