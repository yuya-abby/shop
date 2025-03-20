<!DOCTYPE html>
<html lang="en">
<head>
<?php include "db.php" ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body align="center" style="background-color: #ffeedd;">
<h1 >確認訂單</h1>
    <form action="check2.php" method="get">
    <table align="center">
        <tr>
        <td><img src="img/衣服男1.jpg" style="heigh:200px; width:200px;"></td>
        <td>商品名稱<br><input type="text" name="name"></td>
        
        </tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>

        <tr>
            <td>寄送地址：</td>
            <td><input type="text" name="address"><br></td>
        </tr>
        <tr>
            <td>備註：</td>
            <td><input type="text" name="remark"></td>
        </tr>
        <tr>
            <td>產品數量：</td>
            <td><input type="text" name="puantity"></td>
        </tr>
        <tr>
            <td>總計金額：</td>
            <td><input type="text" name="money">
            <td><input type="button" value="結帳" onclick="location.href='cout.php'"></td>
        </tr>
        </tr>
        
    </table>
</form>
</body>
</html>