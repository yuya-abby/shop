<!DOCTYPE html>
<html lang="en">
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
        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        .password-input {
            padding-right: 40px;
            width: 100%;
        }
        .toggle-icon {
            position: absolute;
            right: 10px;
            cursor: pointer;
            width: 20px;
            height: 20px;
        }
    </style>
    
</head>
<body>
<header>
<img src="img\嚕嚕2.png" autoplay muted loop style="width:80%;">
</header>
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 200px; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="add-user.php">註冊</a></td>
            </tr>
        </table>
        </div></div>
    <h1 align="center">會員登入</h1>
    <form action="login2.php" method="post">
        <table align="center">
        <tr>
            <td>帳號 :</td>
            <td><input type="text" name="account"></td>
        </tr>
        <tr>
            <td>密碼 :</td>
            <td><input type="password" name="password"></td>
        </tr>

        <tr>
            
        <td><input type="submit" value="登入" class="button"></td>
        </tr>

        </table>
        
    </form>
</body>
</html>