<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增商品</title>
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
        .box { 
            position: relative;
            width: 800px;
            height: 250px;
            border: 1px solid #000000;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .list{
            left: 0px;
            display:flex;
            position: absolute;
        }
.photo{
        width: 200px;
        height: 200px;
        border: 3px solid red;
        margin-left: 2px;
        font-size: 5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        }
</style>
<body >
<header>嚕嚕咪賣貨便</header>
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 4%; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:4%; font-size:19px;"><a href="car.php">購物車</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登入</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="add-user.php">註冊</a></td>
            </tr>
        </table>
        </div></div>
<h3 align="center">修改商品</h3>
    <form action="msg3.php" method="post" enctype="multipart/form-data">
    <table border="1" style="width:500px; " align="center">
    <tr >
            <td align="center">圖片</td>
            <td><input type="file" style="height:100px;" name="img"></td>
        </tr>
        <tr>
            <td align="center" style="height:50px;" >商品名稱</td>
            <td><input type="text" name="title"></td>
            
        </tr>
        <tr>
            <td align="center" style="height:100px;">商品說明</td>
            <td><input type="text" name="text"></td>
        </tr>
        <tr>
            <td align="center" style="height:100px;">商品價錢</td>
            <td><input type="text" name="text" ></td>
        </tr>
        <tr align="center">
        <td colspan="2"> 
            <input type="submit" value="新增">
            <input type="reset" value="清除">
        </td>
        </tr>
    </table>
</form>
<!-- 原本的檔案 -->
</body>
</html>