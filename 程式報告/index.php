<!DOCTYPE html>
<html lang="en">
<head>
<?php include "db.php"; ?>
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
</head>
<body>
<header>噜噜咪賣貨便</header>
<form action="index-new" method="post">
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 4%; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:4%; font-size:19px;"><a href="car.php">購物車</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="msg2.php">留言板</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登入</td>
                <td align="center" style="width:4%; font-size:20px;"><a href="add-user.php">註冊</a></td>
            </tr>
        </table>
        </div></div>
        <?php
    $sql="INSERT INTO addproduct (img, money, category) VALUES
('shirt1.jpg', 299, '男裝'),
('shirt2.jpg', 350, '女裝'),
('phonecase1.jpg', 150, '手機殼'),
('earphone1.jpg', 120, '耳機殼'),
('lipstick1.jpg', 450, '口紅')";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            echo "<div class='container'>";
            echo"<div class='product'>";
            echo"<img src='img/".$row["img"]."' onclick=lcation.href='shirt-boy.php?id=".$row['id']."'
            style='height:200px; width:200px;'>";
            echo "<a href='check.php' input type='button'>立即購買</a>";
            echo "<td>".$row['money']."</td>";
            echo "<h3>男裝</h3>" ;
            echo "</div>";
    
            echo "<div class='product'>";
            echo "<img src='img/".$row["img"]."' onclick=lcation.href='shirt-girl.php?id=".$row['id']."'
            style='height:200px; width:200px;'>";
            echo "<a href='check.php' input type='button'>立即購買</a>";
            echo "<h3>女裝</h3>" ;
            echo "</div>";
    
            echo "<div class='product'>";
            echo"<img src='img/".$row["img"]."' onclick=lcation.href='phone.php?id=".$row['id']."' 
            style='height:200px; width:200px;'>";
            echo "<a href='check.php' input type='button'>立即購買</a>";
               echo "<h3>手機殼</h3>";
            echo "</div>";
    
            echo "<div class='product'>";
            echo"<img src='img/".$row["img"]."' onclick=lcation.href='earphone.php?id=".$row['id']."' 
            style='height:200px; width:200px;'>";
            echo "<a href='check.php' input type='button'>立即購買</a>";
            echo"<h3>耳機殼</h3>";
            echo "</div>";
    
            echo "<div class='product'>";
            echo"<img src='img/".$row["img"]."' onclick=lcation.href='lipstick.php?id=".$row['id']."' 
            style='height:200px; width:200px;'>";
            echo "<a href='check.php' input type='button'>立即購買</a>";
            echo"<h3>口紅</h3>";
            echo "</div>";
            
        echo "</div>";
        }
    }
?>
    </form>
</body>
</html>