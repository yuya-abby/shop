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
            font-size: 18px;
            color:black;
        }
    </style>
</head>
<body>
<header>
<img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
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
            // 使用者登入檢查
            if (!isset($_SESSION['account'])) {
                echo "<h3>請先登入。</h3>";
                exit;
            }

            $account = $_SESSION['account'];

            // 抓使用者姓名
            $user_query = "SELECT name FROM user WHERE account = '$account'";
            $user_result = mysqli_query($link, $user_query);
            $user_data = mysqli_fetch_assoc($user_result);
            $name = $user_data['name'] ?? '未知使用者';

            // 檢查是否有選擇商品
            if (!isset($_POST['selected_items'])) {
                echo "<h3>請至少選擇一項商品來結帳。</h3>";
                exit;
            }

            $selected_ids = $_POST['selected_items'];
            $id_list = implode(",", array_map('intval', $selected_ids));

            // 查詢商品資料
            $sql = "SELECT * FROM car WHERE id IN ($id_list)";
            $res = mysqli_query($link, $sql);

            echo "<h2 align='center'>訂單明細</h2>";
            echo "<table border='1' cellspacing='0' cellpadding='10' align='center'>";
            echo "<tr>
                    <th>圖片</th>
                    <th>商品名稱</th>
                    <th>數量</th>
                    <th>單價</th>
                    <th>小計</th>
                </tr>";

            while ($row = mysqli_fetch_assoc($res)) {
                $name_p = $row['addproduct_name'];
                $count = $row['addproduct_count'];
                $subtotal = $row['addproduct_money']; // 小計（單品總額）
                $price = $subtotal * $count; // 單價
                $img = $row['addproduct_img'];

                echo "<tr>
                        <td><img src='$img' width='100'></td>
                        <td>$name_p</td>
                        <td>$count</td>
                        <td>NT$ $subtotal</td>
                        <td>NT$ $price</td>
                    </tr>";

            }
            echo "<tr>
                    <td colspan='4' align='right'><strong>總金額：</strong></td>
                    <td><strong>NT$ $price</strong></td>
                </tr>";
            echo "</table>";

            // 隱藏傳遞選擇的商品 ID
            foreach ($selected_ids as $sid) {
                echo "<input type='hidden' name='selected_items[]' value='$sid'>";
            }
            ?>
        </div>

        <br><br>

        <!-- 使用者資訊與付款、地址 -->
        <table class='info-table'>
            <tr><td><strong>帳號：</strong></td><td><?php echo $account; ?></td></tr>
            <tr><td><strong>姓名：</strong></td><td><?php echo $name; ?></td></tr>
            <tr>
                <td><strong>付款方式：</strong></td>
                <td>
                    <select name="payment" required>
                        <option value="">請選擇</option>
                        <option value="貨到付款">貨到付款</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><strong>電話：</strong></td>
                <td><input type="text" name="phone" required></td>
            </tr>
            <tr>
                <td><strong>寄送地址：</strong></td>
                <td><input type="text" name="address" required></td>
            </tr>
        </table>

        <br>
        <input class="submit-btn" type="submit" value="直接結帳">
    </form>
</div>

</body>
</html>
