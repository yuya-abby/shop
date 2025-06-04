<?php
include "db.php";

if (!isset($_GET['c_id'])) {
    echo "無效商品";
    exit;
}

$c_id = intval($_GET['c_id']);
$sql = "SELECT * FROM aa WHERE c_id = $c_id";
$res = mysqli_query($link, $sql);

if (!$row = mysqli_fetch_assoc($res)) {
    echo "找不到商品";
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便</title>
    <style>
        body {
            background-color: rgb(255, 255, 255);
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
            cursor: pointer;
        }
        .footer {
            background: #333;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 20px;
        }
        .car-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }
        .car-table th, .car-table td {
            padding: 15px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }
        .car-table img {
            width: 80px;
            height: auto;
        }
        .car-total {
            text-align: right;
            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
        }
        .box_fixed {
            width: 100px;
            height: 100px;
            position: fixed;
            right: 0;
            bottom: 0;
            text-align: center;
        }
        a {
            text-decoration: none;
            font-size: 18px;
            color:black;
        }
    </style>
    <?php 
        if (isset($_GET['delete'])) {
            $delete_id = intval($_GET['delete']);
            $delete_sql = "DELETE FROM car WHERE id = $delete_id";
            mysqli_query($link, $delete_sql);
            header("location: " . strtok($_SERVER["REQUEST_URI"], '?'));
            exit;
        }
    ?>
</head>
<body>
    <header>
        <img src="img/嚕嚕2.png" autoplay muted loop style="width:60%;">
    </header>
    <div class="banner">
        <div class="navbar">
            <table style="width:100%;">
                <tr>
                    <td align="center" style="width:100px; font-size:20px;"><a href="index-after.php">首頁</a></td>
                    <td align="center" style="width:100px; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
                    <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div align="center">
        <div style="width:40%; margin: 20px; text-align:center;">
            <h2><?php echo htmlspecialchars($row['c_name']); ?></h2>
            <img src="<?php echo htmlspecialchars($row['c_img']); ?>" width="300"><br>
            <p>價格：<?php echo htmlspecialchars($row['c_money']); ?> 元</p>

            <!-- 加入購物車表單 -->
            <form action="car4.php" method="post">
                <label>數量：</label>
                <input type="number" name="buy_count" min="1" value="1" required>

                <!-- 傳送商品資料 -->
                <input type="hidden" name="addproduct_id" value="<?php echo $row['c_id']; ?>">
                <input type="hidden" name="addproduct_name" value="<?php echo $row['c_name']; ?>">
                <input type="hidden" name="addproduct_img" value="<?php echo $row['c_img']; ?>">
                <input type="hidden" name="addproduct_money" value="<?php echo $row['c_money']; ?>">

                <br><br>
                <input type="submit" value="加入購物車" class="button">
            </form>
        </div>
    </div>
</body>
</html>
