<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>
  body {

     background-color:rgb(240, 234, 234); /* 這是背景 */
       }
 header {
            background-color:rgb(240, 145, 145);
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 30px;
        }

 </style>
</head>
<body align="center">
<header>嚕嚕咪賣貨便</header>
<h1>新增商品</h1>
<form action="賣家2.php" method="get">
    <table align="center">
        <tr>
            <td>商品名稱：<input type="text" name="name" id=""></td>
        </tr>
        <tr>
            <td>價錢：<input type="text" name="account" id=""></td>
        </tr>
        <tr>
            <td>商品說明：<input type="text" name="password" id=""></td>
        </tr>
        <tr>
            <td><img src="img/口紅1.jpg" alt="圖1"></td>
        </tr>
    </table>
    <input type="submit" value="新增">
</form>
</body>
</html>
