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


<div class="container">
    <form action="check.php" method="POST">
        <div class="product-section">
            <?php

            // 檢查是否有選擇商品
            if (!isset($_POST['selected_items'])) {
                echo "<h3>請至少選擇一項商品來結帳。</h3>";
                exit;
            }

            $selected_ids = $_POST['selected_items'];

            // 安全處理 ID 陣列
            $id_list = implode(",", array_map('intval', $selected_ids));

            // 查詢勾選商品資料
            $sql = "SELECT * FROM car WHERE id IN ($id_list)";
            $res = mysqli_query($link, $sql);

            // 顯示訂單內容
            echo "<h2 align='center'>訂單明細</h2>";
            echo "<table border='1' cellspacing='0' cellpadding='10' align='center'>";
            echo "<tr>
                    <th>圖片</th>
                    <th>商品名稱</th>
                    <th>數量</th>
                    <th>單價</th>
                    <th>小計</th>
                </tr>";

            $total = 0;

            while ($row = mysqli_fetch_assoc($res)) {
                $name = $row['addproduct_name'];
                $count = $row['addproduct_count'];
                $price = $row['addproduct_money'] / $count; // 反推出單價
                $subtotal = $row['addproduct_money'];
                $img = $row['addproduct_img'];

                echo "<tr>
                        <td><img src='$img' width='100'></td>
                        <td>$name</td>
                        <td>$count</td>
                        <td>NT$ $price</td>
                        <td>NT$ $subtotal</td>
                    </tr>";

                $total += $subtotal;
            }

            echo "<tr>
                    <td colspan='4' align='right'><strong>總金額：</strong></td>
                    <td><strong>NT$ $total</strong></td>
                </tr>";

            echo "</table>";
            ?>

        </div>

       

        <br>
    <input class="submit-btn" type="submit" value="直接結帳">
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
