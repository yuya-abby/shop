<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php"; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .quantity-selector {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
        }
        .quantity-selector button {
            width: 30px;
            height: 30px;
            border: none;
            background-color: #f0f0f0;
            font-size: 20px;
            cursor: pointer;
        }
        .quantity-selector input[type="text"] {
            width: 40px;
            text-align: center;
            border: none;
            font-size: 18px;
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
                <td style="width: 200px; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="msg2.php">留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="add-user.php">註冊</a></td>
            </form>
            </tr>
        </table>
</div></div>
    <div id='bbb' align='center'>
        <form action="car4.php" method="GET">
            <div style='width:40%; margin: 10px;'>
                <?php
                    $id=$_GET['id'];
                    $sql="SELECT * FROM `addproduct` WHERE `id` = '$id'";
                    $res=mysqli_query($link,$sql);
                    if(mysqli_num_rows($res)>0){
                        while($row=mysqli_fetch_assoc($res)){
                            echo "<br><img src='".$row['img']."' height='350px'><br>
                            <h2>價錢：".$row['money']."</h2>
                            <p style='font-size: 20px;'>購買數量：<input type='number' name='buy_count' style='height: 25px; width: 200px;' min='0'></p>
                            <input type='hidden' name='id' value='".$row['id']."'>
                            <input type='submit' value='加入購物車'>　<input type='button' value='取消' onclick=location.href='buy.php'><br>
                            <p>　</p>";
                        }
                    }
                ?>
            </div>
        </form>
    </div>

    
</body>
</html>