<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<?php include "db.php"; ?>
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
            font-size: 20px;
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

<h1 align="center">結帳資訊</h1>

<div class="container">
    <form action="count-b.php" method="post" enctype="multipart/form-data">
    <table class="product-table">
        <tr>
            <th>商品圖片</th>
            <th>商品名稱</th>
            <th>數量</th>
            <th>單價</th>
            <th>小計</th>
        </tr>
        <?php
        $id = $_GET["id"];
        $sql = "SELECT `id`, `img`, `money`, `category`, `name`, `c_name` FROM `addproduct` WHERE `id`='$id'";
        $res = mysqli_query($link, $sql);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>";
                echo "<td><img src='" . $row['img'] . "' style='height:100px; width:100px;'></td>";
                echo "<input type='hidden' value='".$row['img']."' name='img'>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td><input style='width:50px;' type='number' name='quantity[{$row["id"]}]' value='1' min='1' onchange='updateTotal(this, {$row["money"]}, {$row["id"]})'></td>";
                echo "<td>" . number_format($row["money"], 2) . "</td>";
                echo "<td id='total-{$row["id"]}'>" . number_format($row["money"], 2) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "沒有資料";
        }
        echo "<input type='hidden' name='id' value='".$id."'>";
        ?>
    </table>

    <h3 align="center">購買人資訊</h3>
    <table class="info-table" align="center">
        <?php
        $account = $_SESSION["account"];
        $sql = "SELECT * FROM `user` WHERE `account` = '$account'";
        $res = mysqli_query($link, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr><td>帳號：" . $row["account"] . "</td></tr>";
                echo "<tr><td>姓名：" . $row["name"] . "</td></tr>";
                echo "<tr><td>電話：" . $row["phone"] . "</td></tr>";
                echo "<tr><td>Email：" . $row["email"] . "</td></tr>";
            }
        }
        ?>
        
        <tr>
            <td>付款方式：</td>
            <td>
                <select name="payment">
                    <option value="cod">貨到付款</option>
                </select>
            </td>
        </tr>
    </table>

    <div align="center">
        <input class="submit-btn" type="submit" value="確認結帳">
    </div>
</form>

<script>
    function updateTotal(element, price, id) {
        const quantity = element.value;
        const total = (price * quantity).toFixed(2);
        document.getElementById(`total-${id}`).innerText = total;
    }
</script>

</div>
</body>
</html>