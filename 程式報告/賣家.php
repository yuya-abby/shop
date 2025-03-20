<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便</title>
    <style>
        body {

            background-color:rgb(240, 234, 234); /* 這是背景 */
        }
           
        header {
            background-color: #ff6600;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 30px;

        }
        .banner {
            background: #ffcc00;
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
        
    </style>
</head>
<body>
    <header>噜噜咪賣貨便</header>
    
    <div class="banner"><div class="navbar">
    <a href="index.php"><span class="icon"></span>首頁</a>
    <a href="賣家3.php">新增商品</a>
    <a href="註冊.php">註冊</a>
    <a href="會員登入.php">登入</a>
</div></div>
    
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


