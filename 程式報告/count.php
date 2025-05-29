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

        .product-section input[type="number"] {
            width: 100px;
            padding: 5px;
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

<h1>結帳資訊</h1>

<div class="container">
    <form action="count2.php" method="POST">
        <div class="product-section">
            <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM `addproduct` WHERE `id` = '$id'";
                $res = mysqli_query($link, $sql);
                
                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        $price = $row['money'];
                        echo "
                            <img src='{$row['img']}' height='200' width='200'><br>
                            <h2>價錢：NT$ {$price}</h2>
                            <p style='font-size: 20px;'>
                                購買數量：
                                <input type='number' name='quantity' min='1' value='1'
                                       oninput=\"updateTotal(this, {$price}, {$row['id']})\">
                            </p>
                            <h3>總價：NT$ <span id='total-{$row['id']}'>{$price}</span></h3>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <table class='info-table'>
                                <tr>
                                    <td>付款方式：</td>
                                    <td>
                                        <select name='payment'>
                                            <option value='ATM轉帳'>ATM轉帳</option>
                                            <option value='貨到付款'>貨到付款</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        ";
                    }
                } else {
                    echo "<p>查無商品</p>";
                }
            ?>
        </div>

        <h3>購買人資訊</h3>
        <table class="info-table">
            <?php
                $account = $_SESSION["account"];
                $sql = "SELECT * FROM `user` WHERE `account` = '$account'";
                $res = mysqli_query($link, $sql);

                if (mysqli_num_rows($res) > 0) {
                    while ($row = mysqli_fetch_assoc($res)) {
                        echo "<tr><td>帳號：</td><td>{$row['account']}</td></tr>";
                        echo "<tr><td>姓名：</td><td>{$row['name']}</td></tr>";
                        echo "<tr><td>電話：</td><td>{$row['phone']}</td></tr>";
                        echo "<tr><td>Email：</td><td>{$row['email']}</td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>無法取得使用者資訊</td></tr>";
                }
            ?>
        </table>

        <br>
        <input class="submit-btn" type="submit" value="確認結帳">
    </form>
</div>

<script>
    function updateTotal(element, price, id) {
        const quantity = parseInt(element.value) || 0;
        const total = (price * quantity).toFixed(0);
        document.getElementById(`total-${id}`).innerText = total;
    }
</script>

</body>
</html>
