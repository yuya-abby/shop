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
            background-color:rgb(255, 255, 255); 
            font-family: Arial, sans-serif;
        }
        header {
            background-color:rgb(255, 236, 215);
            color: white;
            text-align: center;
            padding: 15px;
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
        .navbar table {
            width: 100%;
        }
        .navbar td {
            text-decoration: none;
            font-size: 18px;
            color: black;
        }
        .container {
            display: flex;
            justify-content: center;
            margin: 20px;
        }
        .product-table, .info-table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        .product-table th, .product-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .info-table td {
            padding: 8px;
        }
        .submit-btn {
            background: #ff6600;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }
        a{
            text-decoration: none;
            font-size: 18px;
            color:black;
        }
    </style>
</head>
<body>
<header>
    <img src="img/嚕嚕2.png" autoplay muted loop style="width:60%;">
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

<h1 align="center">結帳資訊</h1>

<div class="container">
    <form action="count-b.php" method="post">
        <table class="product-table">
            <tr>
                <th>商品圖片</th>
                <th>商品名稱</th>
                <th>數量</th>
                <th>單價</th>
                <th>小計</th>
            </tr>
            <?php
            $c_id = $_GET["c_id"];
            $sql = "SELECT * FROM aa WHERE c_id = '$c_id'";
            $res = mysqli_query($link, $sql);

            if ($row = mysqli_fetch_assoc($res)) {
                $price = $row["c_money"];
                echo "<tr>";
                echo "<td><img src='" . $row['c_img'] . "' style='height:100px;'></td>";
                echo "<td>" . $row['c_name'] . "</td>";
                echo "<td><input type='number' name='quantity' value='1' min='1' onchange='updateTotal(this, {$price})'></td>";
                echo "<td>" . number_format($price, 2) . "</td>";
                echo "<td id='total'>" . number_format($price, 2) . "</td>";
                echo "</tr>";

                // 隱藏欄位
                echo "<input type='hidden' name='c_id' value='{$row["c_id"]}'>";
                echo "<input type='hidden' name='name' value='{$row["c_name"]}'>";
                echo "<input type='hidden' name='img' value='{$row["c_img"]}'>";
                echo "<input type='hidden' name='price' value='{$row["c_money"]}'>";
            } else {
                echo "<tr><td colspan='5'>找不到商品</td></tr>";
            }
            ?>
        </table>

        <h3>購買人資訊</h3>
        <table class="info-table">
            <?php
            $account = $_SESSION["account"];
            $sql = "SELECT * FROM user WHERE account = '$account'";
            $res = mysqli_query($link, $sql);
            $user = mysqli_fetch_assoc($res);

            echo "<tr><td>帳號：</td><td>{$user["account"]}</td></tr>";
            echo "<tr><td>姓名：</td><td>{$user["name"]}</td></tr>";
            echo "<tr><td>電話：</td><td>{$user["phone"]}</td></tr>";

            echo "<input type='hidden' name='account' value='{$user["account"]}'>";
            echo "<input type='hidden' name='buyer_name' value='{$user["name"]}'>";
            echo "<input type='hidden' name='phone' value='{$user["phone"]}'>";
            ?>
            <tr>
                <td>寄送地址：</td>
                <td><input type="text" name="address" required></td>
            </tr>
            <tr>
                <td>付款方式：</td>
                <td>
                    <select name="payment" required>
                        <option value="貨到付款">貨到付款</option>
                    </select>
                </td>
            </tr>
        </table>

        <div align="center">
            <input class="submit-btn" type="submit" value="確認結帳">
        </div>
    </form>

    <script>
        function updateTotal(input, price) {
            const qty = parseInt(input.value);
            const total = (qty * price).toFixed(2);
            document.getElementById("total").innerText = total;
        }
    </script>
</div>
</body>
</html>
