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
<header>
<video src="img/01.mp4" autoplay muted loop style="width:20%;"></video>
</header>
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 4%; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:5%; font-size:20px;"><a href="car.php">購物車</a></td>
                <td align="center" style="width:5%; font-size:20px;"><a href="msg2.php">留言板</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登出</a></td>
            </tr>
        </table>
        </div></div>


<h1 align="center">編輯權限</h1>
<table align="center" border="1" style="width:700px">
        <tr align="center">
            <td>流水號</td>
            <td>帳號</td>
            <td>密碼</td>
            <td>姓名</td>
            <td>權限</td>
            <td>編輯</td>
        </tr>
        <form action="del.php" method="get">
        <?php
        include ("db.php");
        $sql="SELECT * FROM `user` WHERE 1";
        $res=mysqli_query($link,$sql);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                
                    echo "<tr align='center'>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["account"]."</td>";
                    echo "<td>".$row["password"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["type"]."</td>";
                    echo "<td><input type='button' value='修改(權限)'onclick=location.href='up.php?id=".$row['id']."'>
                    <input type='button' value='刪除' onclick=location.href='del.php?id=".$row["id"]."'></td>";
                     echo "</tr>";
                
                }
            }
            
            
        ?>
        </form>
    </table>
</body>
</html>
