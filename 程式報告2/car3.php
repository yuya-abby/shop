<?php
include "db.php";

if (!isset($_GET['c_id'])) {
    echo "無效商品";
    exit;
}

$c_id = intval($_GET['c_id']);
$sql = "SELECT * FROM aa WHERE c_id = $c_id";
$res = mysqli_query($link, $sql);

if (!$row = mysqli_fetch_assoc($res)) {
    echo "找不到商品";
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便</title>
    <style>
body {
    background-color: rgb(255, 255, 255); /* 頁面整體背景為白色 */
}

header {
    background-color: rgb(255, 236, 215); /* 頁首區塊背景為淺橘色 */
    color: white;                         /* 文字顏色為白色（若有文字） */
    padding: 15px;                        /* 上下左右內距 15px */
    text-align: center;                   /* 文字置中 */
    font-size: 30px;                      /* 文字大小為 30px */
}

header img {
    height: 200px;                        /* 標誌圖片高度為 200px */
}

.banner {
    background: rgb(255, 244, 180);       /* 橫幅背景為淡黃色 */
    text-align: right;                    /* 文字靠右 */
    padding: 8px;                         /* 內距為 8px */
    font-size: 15px;                      /* 字體大小為 15px */
    font-weight: bold;                    /* 文字加粗 */
}

.container {
    display: flex;                        /* 使用彈性排版（Flexbox） */
    flex-wrap: wrap;                      /* 子項目超出會自動換行 */
    justify-content: center;             /* 子項目橫向置中排列 */
    margin: 20px;                         /* 外距為 20px（與其他區塊保持距離） */
}

.product {
    background: white;                   /* 商品卡片背景為白色 */
    margin: 10px;                        /* 外距為 10px */
    padding: 15px;                       /* 內距為 15px */
    width: 250px;                        /* 寬度固定為 250px */
    text-align: center;                 /* 文字內容置中 */
    border-radius: 8px;                 /* 圓角邊框 */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* 添加淡淡陰影提升立體感 */
}

.product img {
    width: 100%;                         /* 圖片寬度佔滿整個卡片 */
    border-radius: 5px;                  /* 圓角 5px */
}

.product h3 {
    font-size: 20px;                     /* 商品標題字體大小為 20px */
    margin: 20px;                        /* 上下間距 20px */
}

.product p {
    color: #888;                         /* 商品敘述或價格使用灰色字體 */
}

.button {
    display: inline-block;              /* 顯示為內聯區塊，方便設寬高與內距 */
    background: #ff6600;                /* 背景橘色 */
    color: white;                       /* 白色文字 */
    padding: 10px;                      /* 內距 10px */
    border-radius: 5px;                 /* 圓角 5px */
    text-decoration: none;             /* 移除底線 */
    margin-top: 10px;                  /* 與上方元素間距為 10px */
    cursor: pointer;                   /* 滑鼠移上去變成手指形狀 */
}

.footer {
    background: #333;                   /* 深灰底 */
    color: white;                       /* 白色文字 */
    text-align: center;                 /* 文字置中 */
    padding: 15px;                      /* 內距 15px */
    margin-top: 20px;                   /* 與上方區塊間距 20px */
}

.car-table {
    width: 100%;                        /* 寬度佔滿容器 */
    border-collapse: collapse;         /* 合併邊框線（讓表格更緊密） */
    table-layout: fixed;               /* 固定欄寬，避免內容撐破 */
}

.car-table th, .car-table td {
    padding: 15px;                      /* 單元格內距 15px */
    border-bottom: 1px solid #ccc;     /* 底部加淺灰色分隔線 */
    text-align: center;                /* 文字置中對齊 */
}

.car-table img {
    width: 80px;                       /* 商品圖片寬度固定 80px */
    height: auto;                      /* 高度自動等比縮放 */
}

.car-total {
    text-align: right;                 /* 總價文字靠右對齊 */
    margin-top: 20px;                  /* 與上方表格間距 20px */
    font-size: 22px;                   /* 字體大小 22px */
    font-weight: bold;                /* 字體加粗 */
}

.box_fixed {
    width: 100px;                      /* 寬度 100px */
    height: 100px;                     /* 高度 100px */
    position: fixed;                   /* 固定在畫面上（不會因滾動而移動） */
    right: 0;                          /* 靠右邊緣 */
    bottom: 0;                         /* 靠底部邊緣 */
    text-align: center;                /* 內容置中 */
}

a {
    text-decoration: none;            /* 移除超連結底線 */
    font-size: 18px;                  /* 字體大小 18px */
    color: black;                     /* 文字顏色為黑色 */
}

    </style>
    <?php 
        if (isset($_GET['delete'])) {
            $delete_id = intval($_GET['delete']);
            $delete_sql = "DELETE FROM car WHERE id = $delete_id";
            mysqli_query($link, $delete_sql);
            header("location: " . strtok($_SERVER["REQUEST_URI"], '?'));
            exit;
        }
    ?>
</head>
<body>
        <audio id="bgm" loop>
    <source src="img/music.mp4" type="audio/mp4">
</audio>

<!-- 播放 / 暫停按鈕 -->
<button id="musicBtn" onclick="toggleMusic()" style="position: fixed; top: 20px; left: 20px; z-index: 999; font-size: 16px;">
    播放音樂 🎵
</button>
<script>
    let isPlaying = false;

    function toggleMusic() {
        const bgm = document.getElementById("bgm");
        const btn = document.getElementById("musicBtn");

        if (isPlaying) {
            bgm.pause();
            btn.textContent = "播放音樂 🎵";
        } else {
            bgm.play();
            btn.textContent = "暫停音樂 ⏸️";
        }

        isPlaying = !isPlaying;
    }
</script>
    <header>
        <img src="img/嚕嚕2.png" autoplay muted loop style="width:60%;">
    </header>
    <div class="banner">
        <div class="navbar">
            <table style="width:100%;">
                <tr>
                    <td align="center" style="width:100px; font-size:20px;"><a href="index-after.php">首頁</a></td>
                    <td align="center" style="width:100px; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
                    <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
                </tr>
            </table>
        </div>
    </div>

    <div align="center">
        <div style="width:40%; margin: 20px; text-align:center;">
            <h2><?php echo htmlspecialchars($row['c_name']); ?></h2>
            <img src="<?php echo htmlspecialchars($row['c_img']); ?>" width="300"><br>
            <p>價格：<?php echo htmlspecialchars($row['c_money']); ?> 元</p>

            <!-- 加入購物車表單 -->
            <form action="car4.php" method="post">
                <label>數量：</label>
                <input type="number" name="buy_count" min="1" value="1" required>

                <!-- 傳送商品資料 -->
                <input type="hidden" name="addproduct_id" value="<?php echo $row['c_id']; ?>">
                <input type="hidden" name="addproduct_name" value="<?php echo $row['c_name']; ?>">
                <input type="hidden" name="addproduct_img" value="<?php echo $row['c_img']; ?>">
                <input type="hidden" name="addproduct_money" value="<?php echo $row['c_money']; ?>">

                <br><br>
                <input type="submit" value="加入購物車" class="button">
            </form>
        </div>
    </div>

</body>
</html>
