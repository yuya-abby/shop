<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊</title>
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
<body align="center"  style="background-color: #ffeedd;">
<header>噜噜咪賣貨便</header>
<div class="banner"><div class="navbar">
    <a href="index.php"><span class="icon"></span>首頁</a>
    <a href="賣家3.php">新增商品</a>
    <a href="註冊.php">註冊</a>
    <a href="會員登入.php">登入</a>
</div></div>
    <h1>會員登入</h1>
    <form action="登入按鈕.php" method="get">
        <table align="center" valign="center" >
        <tr>
            <td>帳號 :</td>
            <td><input type="text" name="account"></td>
        </tr>
        <tr>
            <td>密碼 :</td>
            <td><input type="password" name="password2"></td>
        </tr>
        <tr>
            <td><input type="button" value="登入" onclick="location.href='index.php'"></td>
            <td><input type="button" value="註冊" onclick="location.href='註冊.php'"></td><br>
        </tr>

        </table>
        
    </form>
</body>
</html>