<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便</title>
    <style>
        body {

        background-color:rgb(255, 255, 255); /* 這是背景 */
        }

        header {
        background-color:rgb(255, 236, 215);
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 30px;

        }
        header img{
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
            height: 250px;
        }
        .product h3 {
            font-size: 20px;
            margin: 10px ;/*行間距*/
        }
        .product h4 {
            margin: 5px ;/*行間距*/
        }
        .product h5 {
            margin: 5px ;/*行間距*/
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
        a{
            text-decoration: none;
            font-size: 18px;
            color:black;
        }
        
</style>
<body>
<header><img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;"></header>
      <div class="banner"><div class="navbar">
      <table cellspacing="0" cellpadding="0" style="width:100%;">
        
        <td style="width: 4%; font-size:20px;" align="center"><a href="index.php" style="text-align: right;">
        <a href="首頁.php">首頁</a></td>
        <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>      
        <td align="center" style="width:5%; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登出</a></td>
    </tr>
        </table>
        </div></div>
</div></div> 
<h3 align="center">訂單資訊</h3>
<div class="container">
    <br>
    <?php 
    include("db.php");  
    $sql = "SELECT * FROM `countmoney2` WHERE 1"; 
    $result = mysqli_query($link, $sql);  

    if (mysqli_num_rows($result) > 0) { 
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<form action='更新.php' method='POST' onsubmit='return confirm(\"確定要更新這筆訂單嗎？\");'>";
            echo "<table border='1' cellpadding='10' cellspacing='0' style='margin:20px auto; border-collapse: collapse; width: 90%;'>";
            echo "<tr><th colspan='2' style='background-color:#ffefcc;'>訂單編號 #" . htmlspecialchars($row['id']) . "</th></tr>";
            echo "<tr><td><strong>帳號：</strong></td><td>" . htmlspecialchars($row['name']) . "</td></tr>";
            echo "<tr><td><strong>總金額：</strong></td><td>NT$" . number_format($row['total']) . "</td></tr>";
            echo "<tr><td><strong>商品資訊：</strong></td><td>" . htmlspecialchars($row['product_list']) . "</td></tr>";
            echo "<tr><td><strong>訂購日期：</strong></td><td>" . htmlspecialchars($row['order_date']) . "</td></tr>";
            echo "<tr><td><strong>付款方式：</strong></td><td>" . htmlspecialchars($row['payment']) . "</td></tr>";
            echo "<tr><td><strong>地址：</strong></td><td>" . htmlspecialchars($row['address']) . "</td></tr>";
            echo "<tr><td><strong>電話：</strong></td><td>" . htmlspecialchars($row['phone']) . "</td></tr>";

            echo "<tr><td><strong>是否出貨：</strong></td><td>";
            echo "<select name='status'>";
            echo "<option value='0'" . ($row['status'] == 0 ? " selected" : "") . ">未出貨</option>";
            echo "<option value='1'" . ($row['status'] == 1 ? " selected" : "") . ">已出貨</option>";
            echo "</select>";
            echo "</td></tr>";

            echo "<tr><td colspan='2' align='center'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit'>更新</button>";
            echo "</td></tr>";
            echo "</table>";
            echo "</form>";
        } 
    } else { 
        echo "<p align='center'>無資料。</p>"; 
    } 
    ?>
    <br>
</div>

</body>
</html>