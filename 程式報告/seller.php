<!DOCTYPE html>
<html lang="zh-TW">
<head>
<?php include "db.php"; ?>
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
        }
        .product h3 {
            font-size: 20px;
            margin: 20px ;/*行間距*/
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
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<header>
<img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 200px; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="car.php">購物車</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="msg2.php">留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="add-user.php">註冊</a></td>
            </tr>
        </table>
        </div></div>
        <form action="add-user2.php" method="get">
        <h4 align="center">歡迎賣家:<?php echo $_SESSION["account"]; ?></h4>
    </form>
    
    <div class="container">
        <div class="product">
            <img src="img/口紅1.jpg" alt="圖1">
            <h3>口紅1</h3>
            <p>$ 299</p>
            <a href="index.php" input type="button" value="立即購買"class="button">立即購買</a>
          
        </div>
        <div class="product">
            <img src="img/口紅2.jpg" alt="商品圖片">
            <h3>熱銷商品 2</h3>
            <p>$ 399</p>
            <a href="#" class="button">立即購買</a>
           
        </div>
        <div class="product">
            <img src="img/口紅3.jpg" alt="商品圖片">
            <h3>熱銷商品 3</h3>
            <p>$ 499</p>
            <a href="#" class="button">立即購買</a>
        </div>
        <div class="product">
            <img src="img/口紅4.jpg" alt="商品圖片">
            <h3>熱銷商品 3</h3>
            <p>$ 599</p>
            <a href="" class="button">立即購買</a>
        </div>
    </div>
    
</body>
</html>


