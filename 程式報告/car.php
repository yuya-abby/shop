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
        .car-table {
            width: 100%;
            border-collapse: collapse;
        }
        .car-table th, .car-table td {
            padding: 15px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        .car-table img {
            width: 80px;
            height: auto;
        }

        .car-total {
            text-align: right;
            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
        }
        .box_fixed {
            width: 100px;
            height: 100px;
            position: fixed;
            right: 0;
            bottom: 0;
            text-align: center;
            
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
<header>
<img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
            <tr>
            <form action="" method="get">
                <td style="width: 200px; font-size:20px;" align="center"><a href="index-after.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
            </form>
            </tr>
        </table>
        </div></div>
<h1 align="center">購物車</h1>
<form action="" method="post">
    <table align="center">
        <thead class="car-table">
            <tr>
                <td style="width: 500px; font-size:20px;">商品圖片</td>
                <td style="width: 500px; font-size:20px;">商品名稱</td>
                <td style="width: 300px; font-size:20px;">數量</td>
                <td style="width: 300px; font-size:20px;">小計</td>
            </tr>
                <?php
                    $sql="SELECT * FROM `car` WHERE 1";

                    if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
                        $keyword = $_GET['keyword'];
                        $sql.=" AND `addproduct_name` LIKE '%$keyword%'";
                    }
                    $res=mysqli_query($link,$sql);

                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            echo "<tr>
                                <td><img src='".$row['addproduct_img']."' width='200px'></td>
                                <td>".$row['addproduct_name']."</td>
                                <td>".$row['addproduct_count']."</td>
                                <td>".$row['addproduct_money']."</td>
                            </tr>";
                        }
                    }
                ?>
        </thead>
    </table>
    <table align="right">
    <tr>
        <td>
            <div class="box_fixed">
                <a href="#" class="button" onclick="location.href='count.php'" style="width: 100px;">立即結帳</a>
            </div>
        </td>
    </tr>
    </table>

</form>
</body>
</html>
