<!DOCTYPE html>
<html lang="en">
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
<table cellspacing="0" cellpadding="0" style="width:100%;">
        
        <td style="width: 4%; font-size:20px;" align="center"><a href="index.php" style="text-align: right;">
        <a href="首頁.php">首頁</a></td>
        <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" 
        value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  
        style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
        <td align="center" style="width:4%; font-size:19px;"><a href="car.php">購物車</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="新增其他種類.php">新增其他種類</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="會員登入.php">登入</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="註冊.php">註冊</a></td>

    </tr>
</table>
</div></div>

    <div class="container">
        <div class="product">
        <img src="img/衣服男1.jpg" onclick="location.href='男裝賣家首頁.php'" 
        style="height:200px; width:200px;">
            <h3>衣服男</h3>
            <a class="button"  onclick="location.href='男裝賣家首頁.php'" >進入</a>
        </div>

        <div class="product">
        <img src="img/手機殼1.jpg" onclick="location.href='手機殼.php'" 
        style="height:200px; width:200px;">
            <h3>手機殼</h3>
            <a  class="button"  onclick="location.href='手機殼.php'" >進入</a>
        </div>
        <div class="product">
        <img src="img/口紅1.jpg" onclick="location.href='口紅賣家首頁.php'" 
        style="height:200px; width:200px;">
            <h3>口紅</h3>
            <a  class="button"  onclick="location.href='口紅賣家首頁.php'" >進入</a>
        </div> 
        <div class="product">
        <img src="img/衣服女1.jpg" onclick="location.href='女裝.php'" 
        style="height:200px; width:200px;">
            <h3>衣服女</h3>
            <a  class="button"  onclick="location.href='女裝.php'" >進入</a>
        </div> 
    
        <div class="product">
        <img src="img/耳機殼1.jpg" onclick="location.href='耳機殼.php'" 
        style="height:200px; width:200px;">
            <h3>耳機殼</h3>
            <a  class="button"  onclick="location.href='耳機殼.php'" >進入</a>
        </div> 
    </div>
</div>
</body>
</html>


