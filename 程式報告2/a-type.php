<!DOCTYPE html>
<html lang="en">
<head>
<?php include ("db.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便</title>
    <style>
/* 設定整個網頁背景顏色為白色 */
body {
    background-color: rgb(255, 255, 255); /* 這是背景 */
}

/* 頁首樣式設定 */
header {
    background-color: rgb(255, 236, 215); /* header 背景色為淡橘色 */
    color: white; /* 文字顏色為白色（不過 header 裡面可能沒文字） */
    padding: 15px; /* 內距 15px */
    text-align: center; /* 文字置中對齊 */
    font-size: 30px; /* 字體大小為 30px */
}

/* header 中圖片的樣式 */
header img {
    height: 200px; /* 圖片高度固定為 200px */
}

/* 上方橫幅（通常是通知條）的樣式 */
.banner {
    background: rgb(255, 244, 180); /* 淡黃色背景 */
    text-align: right; /* 文字靠右對齊 */
    padding: 8px; /* 內距 8px */
    font-size: 15px; /* 字體大小為 15px */
    font-weight: bold; /* 粗體 */
}

/* 商品容器：使用 flexbox 排列所有商品項目 */
.container {
    display: flex; /* 使用 flex 排版 */
    flex-wrap: wrap; /* 換行 */
    justify-content: center; /* 水平置中排列 */
    margin: 20px; /* 外距 20px */
}

/* 單個商品卡片的樣式 */
.product {
    background: white; /* 背景白色 */
    margin: 10px; /* 外距 10px */
    padding: 15px; /* 內距 15px */
    width: 250px; /* 固定寬度 250px */
    text-align: center; /* 文字置中 */
    border-radius: 8px; /* 圓角 8px */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* 淡淡的陰影效果 */
}

/* 商品圖片樣式 */
.product img {
    width: 100%; /* 寬度 100%，即填滿容器 */
    border-radius: 5px; /* 圓角 5px */
}

/* 商品標題樣式 */
.product h3 {
    font-size: 20px; /* 字體大小為 20px */
    margin: 20px; /* 四周外距 20px（調整行距） */
}

/* 商品描述文字樣式 */
.product p {
    color: #888; /* 淺灰色文字 */
}

/* 購物按鈕樣式 */
.button {
    display: inline-block; /* 行內區塊元素，方便排版 */
    background: #ff6600; /* 橘色背景 */
    color: white; /* 白色文字 */
    padding: 10px; /* 內距 10px */
    border-radius: 5px; /* 圓角 5px */
    text-decoration: none; /* 取消底線 */
    margin-top: 10px; /* 上方間距 10px */
}

/* 頁尾樣式 */
.footer {
    background: #333; /* 深灰色背景 */
    color: white; /* 白色文字 */
    text-align: center; /* 文字置中 */
    padding: 15px; /* 內距 15px */
    margin-top: 20px; /* 上方外距 20px */
}

/* 所有超連結的預設樣式 */
a {
    text-decoration: none; /* 取消底線 */
    font-size: 18px; /* 字體大小 18px */
    color: black; /* 黑色文字 */
}

/* 漢堡選單圖示的容器 */
.menu-toggle {
    position: absolute; /* 絕對定位 */
    top: 15px; /* 離上方 15px */
    left: 15px; /* 離左邊 15px */
    display: flex; /* 使用 flex 排列 */
    flex-direction: column; /* 垂直方向排列 */
    cursor: pointer; /* 滑鼠指標為點擊手勢 */
    z-index: 1100; /* 比側邊選單高，確保顯示在上層 */
}

/* 漢堡選單內的三條橫線樣式 */
.menu-toggle span {
    background: black; /* 黑色橫線 */
    height: 3px; /* 高度 3px */
    margin: 4px 0; /* 上下間距 4px */
    width: 25px; /* 寬度 25px */
}

/* 側邊選單的主樣式 */
.category-menu {
    position: fixed; /* 固定位置，不會因為捲動而移動 */
    top: 0; /* 從頂部開始 */
    left: -260px; /* 初始位置隱藏在左側畫面外 */
    width: 260px; /* 固定寬度 */
    height: 100%; /* 高度為整個螢幕 */
    background: #4a4a4a; /* 深灰色背景 */
    color: white; /* 白色文字 */
    padding-top: 50px; /* 上方留空 50px */
    transition: left 0.3s ease; /* 滑出動畫效果 */
    overflow-y: auto; /* 內容超出時可垂直捲動 */
    z-index: 1000; /* 層級高於其他內容 */
}

/* 當加入 active 類別時，將側邊選單滑出來 */
.category-menu.active {
    left: 0; /* 顯示在畫面上 */
}

/* 單一分類項目的樣式 */
.category-item {
    padding: 10px 15px; /* 內距上下10、左右15 */
    border-bottom: 1px solid #666; /* 底部有一條深灰色分隔線 */
}

/* 側邊選單內的連結樣式 */
.category-item a {
    color: white; /* 白色文字 */
    display: block; /* 占滿整行 */
    line-height: 1.6; /* 行高 */
}

/* 側邊選單裡每個選項的連結 */
.menu-item a {
    color: rgb(227, 227, 227); /* 淺灰白色 */
    text-decoration: none; /* 無底線 */
    font-size: 20px; /* 字體大小為 20px */
    font-weight: bold; /* 粗體 */
}

/* 滑鼠滑過選單項目時的效果 */
.menu-item a:hover {
    color: rgb(216, 219, 223); /* 顏色變更為更淺一點的灰 */
    text-decoration: underline; /* 加上底線 */
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

        $sql = "SELECT * FROM `pro_type`";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='menu-item'>";
                echo "<a href='女裝2.php?pt_id=" . $row["pt_id"] . "'>" . htmlspecialchars($row["pt_name"]) . "</a>";
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
    <table border="1" style="width:500px;" align="center">
        <tr>
            <td>圖片</td>
            <td><input type="file" style="height:100px;" name="img" required accept="image/*"></td>
        </tr>
        <tr>
            <td align="center" style="height:50px;">商品種類</td>
            <td><input type="text" name="pt_name" required></td>
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