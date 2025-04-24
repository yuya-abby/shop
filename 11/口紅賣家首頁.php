<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便</title>
</head>
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
<body>
<header>噜噜咪賣貨便</header>
      <div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 4%; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="car.php">購物車</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="msg2.php">留言板</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登入</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="add-user.php">註冊</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登出</a></td>
            </tr>
        </table>
        </div></div>
</div></div>
    
    <div class="container">
        <div class="product">
            <img src="img/口紅1.jpg" alt="圖1">
            <h3>口紅 1</h3>
            <p>$ 299</p>
            <a href="index.php" input type="button" value="立即購買"class="button">立即購買</a>
            <div style="text-align: right;">
            <a href="修改商品.php">修改商品</a>
            </div>
        </div>
        <div class="product">
            <img src="img/口紅2.jpg" alt="商品圖片">
            <h3>口紅 2</h3>
            <p>$ 399</p>
            <a href="#" class="button">立即購買</a>
            <div style="text-align: right;">
            <a href="修改商品.php">修改商品</a>
            </div>
        </div>
        <div class="product">
            <img src="img/口紅3.jpg" alt="商品圖片">
            <h3>口紅 3</h3>
            <p>$ 499</p>
            <a href="#" class="button">立即購買</a>
             <div style="text-align: right;">
            <a href="修改商品.php">修改商品</a>
            </div>
        </div>
        <div class="product">
            <img src="img/口紅4.jpg" alt="商品圖片">
            <h3>口紅 3</h3>
            <p>$ 599</p>
            <a href="" class="button">立即購買</a>
            <div style="text-align: right;">
            <a href="修改商品.php">修改商品</a>
            </div>
    </div>
      
</body>
</html>