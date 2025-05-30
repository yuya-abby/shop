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

        .menu-toggle {
            position: absolute;
            top: 15px;
            left: 15px;
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }

        .menu-toggle span {
            background: black;
            height: 3px;
            margin: 4px 0;
            width: 25px;
        }

        /* 側邊選單樣式 */
        .category-menu {
            position: fixed;
            top: 0;
            left: -260px;
            width: 260px;
            height: 100%;
            background: #4a4a4a;
            color: white;
            padding-top: 50px;
            transition: left 0.3s ease;
            overflow-y: auto;
            z-index: 1000;
        }

        .category-menu.active {
            left: 0;
        }

        .category-item {
            padding: 10px 15px;
            border-bottom: 1px solid #666;
        }

        .category-item a {
            color: white;
            display: block;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<!-- Header 區塊，包含 logo 與漢堡選單 -->
<header>
    <div class="menu-toggle" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <img src="img/嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>

<!-- 側邊分類選單 -->
<div id="categoryMenu" class="category-menu">
    <div class="category-item"><a href="index.php">首頁</a></div>
    <div class="category-item"><a href="shirt-girl.php">衣服(女)</a></div>
    <div class="category-item"><a href="shirt-boy.php">衣服(男)</a></div>
    <div class="category-item"><a href="phone.php">手機殼</a></div>
    <div class="category-item"><a href="lipstick.php">口紅</a></div>
    <div class="category-item"><a href="a-msg.php">新增總類</a></div>
</div>

    </style>
</head>
<body>



<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
                <td align="center" style="width:100px; font-size:20px;"><a href="a-msg.php">管理留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="a-msg.php">管理商品</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
            </tr>
        </table>
        </div></div>
        
<h1 align="center">管理商品</h1>
<table align="center" border="1" style="width:700px">
        <tr align="center">
            <td>流水號</td>
            <td>帳號</td>
            <td>密碼</td>
            <td>姓名</td>
            <td>電話</td>
            <td>Email</td>
            <td>權限</td>
            <td>編輯</td>
        </tr>
        <?php

        $sql="SELECT * FROM `addproduct` WHERE 1";
        $res=mysqli_query($link,$sql);
        if(mysqli_num_rows($res)>0){
            while($row=mysqli_fetch_assoc($res)){
                
                    echo "<tr align='center'>";
                    echo "<td>".$row["id"]."</td>";
                    echo "<td>".$row["img"]."</td>";
                    echo "<td>".$row["money"]."</td>";
                    echo "<td>".$row["category"]."</td>";
                    echo "<td>".$row["name"]."</td>";
                    echo "<td>".$row["c_name"]."</td>";
                    echo "<td><input type='button' value='修改(權限)'onclick=location.href='up.php?id=".$row['id']."'>
                    <input type='button' value='刪除' onclick=location.href='del2.php?id=".$row["id"]."'></td>";
                     echo "</tr>";
                
                }
            }
            
            
        ?>
    </table>
    
    <script>
function toggleMenu() {
    document.getElementById('categoryMenu').classList.toggle('active');
}
</script>
</body>
</html>