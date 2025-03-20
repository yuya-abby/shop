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
<body style="background-color: #ffeedd;">
<header>噜噜咪賣貨便</header>
<div class="banner"><div class="navbar">
    <a href="index.php"><span class="icon"></span>首頁</a>
    <a href="賣家3.php">新增商品</a>
    <a href="註冊.php">註冊</a>
    <a href="會員登入.php">登入</a>
    <p style="text-align: left;">公告‼ 
        <marquee scrolldelay='1' width='70%' bgColor='' behavior='Alternat' direction='' style='color:;' height='60px'>請勿隨意洩露個人或機密資訊！ 為了保障您的隱私與安全，請勿將敏感資料（如姓名、聯絡方式、帳戶資訊等）隨意分享給他人或在未經授權的平台上公開。如有需要，請確保資訊僅提供給可信賴的對象，並遵守相關保密規範。謹慎處理您的個人資訊，以免造成不必要的風險！</marquee></p>
</div></div>


<h1 align="center">註冊</h1>
<form action="註冊按鈕.php" method="get">

        <table align="center">
            <tr  >
                <td style="width: 120px; height: 20px;">聯絡人:</td>
                <td><input type="text" name="name"></td>.
                <br>
            </tr>
            <tr>
                <td  style="width: 120px; height: 50px;">帳號:</td>
                <td><input type="text" name="account"></td>
                <br>
            </tr>
            <tr>
                <td style="width: 120px; height: 50px;">密碼:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td style="width: 120px; height: 50px;">再次確認密碼:</td>
                <td><input type="password" name="password2"></td>
            </tr>
          
        </table>
        <table align="center">
        <tr>
        
        <td colspan="2" align="center"><input type="button" value="確定" onclick="location.href='會員登入.php'" ></td>
        <td colspan="2" align="center"><input type="button" value="返回" onclick="location.href='會員登入.php'" ></td>
   
    </tr>
    <br>
      

        </table>
        <p style="font-size: 13px;" align="center">如果已經有帳號請按返回</p>
    </form>
</body>
</html>
