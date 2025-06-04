<!DOCTYPE html>
<html lang="en">
<head>
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
            font-size: 18px;
            color:black;
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
        .menu-toggle {
            z-index: 1100; /* 比側邊選單高就好 */
        }
        



.menu-item a {
    color:rgb(227, 227, 227);
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;

}

.menu-item a:hover {
    color:rgb(216, 219, 223);
    text-decoration: underline;
}
a{
    text-decoration: none;
}
</style>

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
    <div class="category-list">
        <?php
        include("db.php"); // 確保你有連接資料庫

        $sql = "SELECT * FROM `pro_type`";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='menu-item'>";
                echo "<a href='女裝.php?pt_id=" . $row["pt_id"] . "'>" . htmlspecialchars($row["pt_name"]) . "</a>";
                echo "</div>";
            }
        }
        ?>
    </div>
</div>



    </style>
</head>
<body>



<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
                <td align="center" style="width:100px; font-size:20px;"><a href="admin.php">編輯帳號、權限</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="a-msg.php">管理留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="a-commodity.php">管理商品</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
            </tr>
        </table>
        </div></div>
        
     <h3 align="center">新增分類</h3>
<form action="a-type2.php" method="post" enctype="multipart/form-data">
    <table border="1" style="width:500px; " align="center">
   
        <form action="a-type2.php" method="post" enctype="multipart/form-data">
    <table border="1" style="width:500px ;" style="width:500px ;" align="center">
   <tr>
            <td align="center" style="height:50px;">商品種類</td>
            <td><input type="text" name="pt_name" require></td>
        </tr>

        
        <tr align="center">
        <td colspan="2"> 
            <input type="submit" value="新增">
            <input type="reset" value="清除">
        </td>
        </tr>
    </table>

</form>

    
    <script>
function toggleMenu() {
    document.getElementById('categoryMenu').classList.toggle('active');
}
</script>
</body>
</html>