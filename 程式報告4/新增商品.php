<!DOCTYPE html>
<html lang="en">
<head >
    <?php include ("db.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增商品</title>
</head>
<style>

        body {

        background-color:rgb(255, 255, 255); /* 這是背景 */
        }

        header {
        background-color:rgb(255, 236, 215);
      
        text-align: center;


        }
        header img{
        height: 200px;
     
        }
        .banner {
        background:rgb(255, 244, 180);
       /* text-align: right;*/
        padding: 7px;
        font-size: 15px;
        font-weight: bold;/*文字加粗（變粗體*/
        }
        .container {
            display: flex;
            flex-wrap: wrap;/*自動換行*/
            justify-content: center;/*justify-content主軸方向 預設為橫向）置中排列*/
            margin: 20px;/*這個元素的四個邊（上、右、下、左）各留 20 像素的空白空間*/
            
        }
        .product {
            background: white;/* 背景顏色設為 白色*/
            margin: 10px;/*外距（四邊）是 10px*/
            padding: 15px;/*內距是 15px 內部的內容（如圖片、標題、價格等）會與邊框保持 15px 距離，讓版面看起來不擁擠*/
            width: 250px;
            text-align: center;
            border-radius: 8px;/*圓弧化 8px*/
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product img {
            width: 100%;
            border-radius: 5px;
            height: 250px;
        }
        .product h3 {
            font-size: 20px;
            margin: 10px ;/*行間距*/
        }
        .product h4 {
            margin: 5px ;/*行間距*/
        }
        .product h5 {
            margin: 5px ;/*行間距*/
            color: #888;
        }
      
        .button {
            background: #ff6600;
            color: white;
            padding: 10px;
            border-radius: 5px;/*圓弧*/
            text-decoration: none;/*取消連結預設的「底線樣式*/
            margin-top: 10px;/*垂直間距為 10px */
        }
      
        a{
            text-decoration: none;
            font-size: 18px;
            color:black; 
        }

</style>
<body >
<header>
<img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>
<div class="banner"><div class="navbar">
<table cellspacing="0" cellpadding="0" style="width:100%;">
        
    <td style="width: 4%; font-size:20px;" align="center"><a href="index.php" style="text-align: right;">
        <a href="首頁.php">首頁</a>
        <td align="center" style="width:4%; font-size:20px;"><a href="首頁.php">返回</a></td>
    </td>
    <td align="center" style="width:4%; font-size:20px;"><a href="接收商品資運.php">接收訂單</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登出</a></td>
    </tr>
        </table>
        </div></div>
<h3 align="center">新增商品</h3>
<form action="新增商品2.php" method="post" enctype="multipart/form-data">

    <table border="1" style="width:500px; " align="center">
    <tr >
            <td align="center">圖片</td>
            <td><input type="file" style="height:100px;" name="img"></td>
        </tr>
        <form action="新增種類2.php" method="post" enctype="multipart/form-data">
    <table border="1" style="width:500px ;" style="width:500px ;" align="center">
        <tr>
            <td align="center" style="height:50px;">商品種類 ID</td>
            <td>
                <select name="pt_id" required>
                    <option value="">請選擇商品種類</option>
                    <?php
                    include("db.php");
                    $sql = "SELECT pt_id, pt_name FROM pro_type";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['pt_id'] . "'>" . $row['pt_id'] . " - " . $row['pt_name'] . "</option>";
                    }
                    ?>
                </select>
        <tr>
            <td align="center" style="height:50px;">商品名稱</td>
            <td><input type="text" name="c_name" require></td>
            
        </tr>
        
            <td align="center" style="height:100px;">商品說明</td>
            <td><input type="text" name="c_text" require></td>
        </tr>
        <tr>
            <td align="center" style="height:100px;">商品價錢</td>
            <td><input type="text" name="c_money" require></td>
        </tr>
        <tr align="center">
        <td colspan="2"> 
            <input type="submit" value="新增">
            <input type="reset" value="清除">
        </td>
        </tr>
    </table>

</form>
</body>
</html>