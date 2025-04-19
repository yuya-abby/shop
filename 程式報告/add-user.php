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
        
                <td style="width: 4%; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="car.php">購物車</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="msg2.php">留言板</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登入</a></td>
            </tr>
        </table>
        </div></div>


<h1 align="center">註冊</h1>
<form action="add-user2.php" method="post">
<table align="center"  border="1" cellpadding="4">
            <tr>
                <th>欄位</th><th>資料</th>
            </tr>
            <tr>
                <td>帳號:</td>
                <td><input type="text" name="account"></td>
                <br>
            </tr>
            <tr  >
                <td>聯絡人:</td>
                <td><input type="text" name="name"></td>.
                <br>
            </tr>
            <tr>
                <td>密碼:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>type:</td>
                <td><select name="type">
                <option value="user">u</option>
                <option value="admin">a</option>
                </select></td>
                <br>
            </tr>
        <tr>
        <td>
            <input type="submit" value="確定">
            <input type="submit" value="返回" onclick="location.href='login.php'" >
        </td>
    </tr>
    <br>
      

        </table>
        <p style="font-size: 13px;" align="center">如果已經有帳號請按返回</p>
    </form>
</body>
</html>
