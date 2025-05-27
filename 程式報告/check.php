<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<?php 
include "db.php"; 

?>
<meta charset="UTF-8">
<title>噜噜咪賣貨便</title>
<style>
    body {
        background-color: rgb(255, 255, 255);
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    header {
        background-color: rgb(255, 236, 215);
        text-align: center;
        padding: 20px;
    }
    header img {
        height: 150px;
    }
    .banner {
        background: rgb(255, 244, 180);
        padding: 10px;
        text-align: right;
    }
    .navbar table {
        width: 100%;
    }
    .navbar td {
        font-size: 18px;
        text-align: center;
        padding: 5px;
    }
    .navbar a {
        color: black;
        text-decoration: none;
        font-weight: bold;
    }
    .container {
        max-width: 900px;
        margin: 30px auto;
        padding: 20px;
    }
    h3 {
        text-align: center;
        margin-top: 40px;
    }
    .product-table {
        width: 100%;
        border-collapse: collapse;
        margin: 30px 0;
    }
    .product-table th, .product-table td {
        border: 1px solid #ddd;
        padding: 12px;
        text-align: center;
    }
    .product-table th {
        background-color: #f9f9f9;
    }
    .info-table {
        margin: 0 auto 30px;
        width: 100%;
        max-width: 500px;
    }
    .info-table td {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }
    .submit-btn {
        background-color: #ff6600;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        display: block;
        margin: 30px auto;
    }
</style>
</head>
<body>

<header>
    <img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>

<div class="banner">
    <div class="navbar">
        <table>
            <tr>
                <td><a href="index-after.php">首頁</a></td>
                <td><a href="msg-after2.php">留言板</a></td>
                <td><a href="login.php">登出</a></td>
            </tr>
        </table>
    </div>
</div>

<div class="container">
    <h3>購物明細</h3>
    <table class="product-table">
        <tr>
            <th>商品名稱</th>
            <th>數量</th>
            <th>總計</th>
            <th>付款方式</th>
        </tr>
        <?php
        $c_name=$_SESSION["c_name"];
        $sql = "SELECT * FROM `countmoney` WHERE `c_name` = '$c_name'";
        $res = mysqli_query($link, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td>" . $row["c_name"] . "</td>";
                echo "<td>" . $row["quantitiy"] . "</td>";
                echo "<td>" . $row["subtotal"] . "</td>";
                echo "<td>" . $row["payment_method"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>尚無訂單資料</td></tr>";
        }
        ?>
    </table>

    <h3>購買人資訊</h3>
    <table class="info-table">
        <?php
        if (isset($_SESSION["account"])) {
            $account = $_SESSION["account"];
            $sql = "SELECT * FROM `user` WHERE `account` = '$account'";
            $res = mysqli_query($link, $sql);

            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr><td>帳號：{$row["account"]}</td></tr>";
                    echo "<tr><td>姓名：{$row["name"]}</td></tr>";
                    echo "<tr><td>電話：{$row["phone"]}</td></tr>";
                    echo "<tr><td>Email：{$row["email"]}</td></tr>";
                }
            }
        } else {
            echo "<tr><td>尚未登入，無法顯示使用者資訊。</td></tr>";
        }
        ?>
    </table>

    <form action="order-complete.php" method="post">
        <input class="submit-btn" type="submit" value="完成訂單">
    </form>
</div>

</body>
</html>
