<?php
include "db.php";
$account = $_SESSION["account"];

// 完成訂單邏輯
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['complete_order_id'])) {
    $id = intval($_POST['complete_order_id']);
    $update_sql = "UPDATE countmoney SET status = '已完成' WHERE id = $id AND account = '$account'";
    mysqli_query($link, $update_sql);
}

$sql = "SELECT * FROM countmoney WHERE account = '$account' ORDER BY order_date DESC LIMIT 10";
$res = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便</title>
    <style>
body {
    font-family: Arial;                          /* 全站使用 Arial 字體 */
    background-color: rgb(255, 255, 255);        /* 背景設為白色 */
}

header {
    background-color: rgb(255, 236, 215);        /* 頁首背景為淺橘色 */
    color: white;                                /* 文字顏色為白色 */
    padding: 15px;                               /* 內距 15px */
    text-align: center;                          /* 文字置中 */
    font-size: 30px;                             /* 字體大小 30px */
}

header img {
    height: 200px;                               /* 標誌圖片高度為 200px */
}

.banner {
    background: rgb(255, 244, 180);              /* 橫幅背景為淡黃色 */
    text-align: right;                           /* 文字靠右 */
    padding: 8px;                                /* 內距 8px */
    font-size: 15px;                             /* 字體大小 15px */
    font-weight: bold;                           /* 粗體文字 */
}

.container {
    display: flex;                               /* 使用彈性排版 */
    flex-wrap: wrap;                             /* 子元素超出自動換行 */
    justify-content: center;                     /* 子元素橫向置中排列 */
    margin: 20px;                                /* 外距為 20px */
}

.product {
    background: white;                           /* 商品卡背景為白色 */
    margin: 10px;                                /* 外距 10px */
    padding: 15px;                               /* 內距 15px */
    width: 250px;                                /* 固定寬度 250px */
    text-align: center;                          /* 文字置中 */
    border-radius: 8px;                          /* 圓角邊框 */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);      /* 加入淡淡陰影 */
}

.product img {
    width: 100%;                                 /* 圖片寬度填滿容器 */
    border-radius: 5px;                          /* 圓角圖片 */
}

.product h3 {
    font-size: 20px;                             /* 商品標題字體大小 */
    margin: 20px;                                /* 上下間距 20px */
}

.product p {
    color: #888;                                 /* 商品敘述文字為灰色 */
}

.button {
    display: inline-block;                       /* 可設定寬高的 inline 區塊 */
    background: #ff6600;                         /* 橘色背景 */
    color: white;                                /* 文字為白色 */
    padding: 10px;                               /* 內距 10px */
    border-radius: 5px;                          /* 圓角 */
    text-decoration: none;                       /* 移除底線 */
    margin-top: 10px;                            /* 與上方元件距離 10px */
}

.footer {
    background: #333;                            /* 深灰背景 */
    color: white;                                /* 白色文字 */
    text-align: center;                          /* 文字置中 */
    padding: 15px;                               /* 內距 15px */
    margin-top: 20px;                            /* 與上方區塊距離 20px */
}

a {
    text-decoration: none;                       /* 連結取消底線 */
    font-size: 18px;                             /* 字體大小為 18px */
    color: black;                                /* 黑色文字 */
}

h1 {
    text-align: center;                          /* 主標題置中 */
    margin-top: 30px;                            /* 與上方元件間距 30px */
}

table {
    border-collapse: collapse;                   /* 邊框合併 */
    width: 90%;                                  /* 表格寬度佔 90% 畫面寬度 */
    margin: 20px auto;                           /* 上下距離 20px，水平置中 */
}

th {
    background-color: #f9d493;                   /* 表頭背景為淡橘色 */
}

td {
    padding: 10px;                               /* 儲存格內距為 10px */
    text-align: center;                          /* 內容置中 */
}

input[type="text"] {
    font-size: 16px;                             /* 文字輸入框字體大小 */
}

.btn-complete {
    background-color: #28a745;                   /* 綠色背景（成功色） */
    color: white;                                /* 白色文字 */
    padding: 6px 12px;                           /* 內距：上下6px，左右12px */
    border: none;                                /* 無邊框 */
    border-radius: 4px;                          /* 圓角邊框 */
    cursor: pointer;                             /* 滑鼠指標變成手型 */
}

.btn-complete:hover {
    background-color: #218838;                   /* 滑鼠懸停時變成深綠色 */
}

    </style>
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
        <img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
    </header>
<div class="banner">
    <div class="navbar">
        <table cellspacing="0" cellpadding="10" style="width:100%; margin: 0; border-collapse: collapse;">
            <tr style="vertical-align: middle;">
                <td style="width: 200px; font-size:20px; text-align:center;">
                    <a href="index-after.php">首頁</a>
                </td>
                <td style="width: 100px; font-size:20px; text-align:center;">
                    <a href="car.php">購物車</a>
                </td>

                <td style="width: 100px; font-size:20px; text-align:center;">
                    <a href="msg-after2.php">留言板</a>
                </td>

                <td style="width: 100px; font-size:20px; text-align:center;">
                    <a href="login.php">登出</a>
                </td>
            </tr>
        </table>
    </div>
</div>


    <h1>您的訂單明細</h1>
    <table>
        <tr>
            <th>數量、名稱</th>
            <th>總價</th>
            <th>付款方式</th>
            <th>訂購時間</th>
            <th>訂購人姓名</th>
            <th>狀態</th>
        </tr>
        <?php
        $sql = "SELECT * FROM `countmoney2` WHERE 1";
        $result = mysqli_query($link, $sql);
            // 搜尋
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                <td>{$row['product_list']}</td>
                <td>NT$ {$row['total']}</td>
                <td>{$row['payment']}</td>
                <td>{$row['order_date']}</td>
                <td>{$row['name']}</td>
                <td>";

            if ($row['status'] === '未出貨') {
                echo "<span style='color: orange; font-weight: bold;'>未出貨</span>";
            } elseif ($row['status'] === '已出貨') {
                echo "<span style='color: green; font-weight: bold;'>已出貨</span>";
            } else {
                echo "<span style='color: orang;'>未出貨</span>";
            }
            }
        } else {
                echo "<tr><td colspan='10'>尚無訂單紀錄。</td></tr>";
            }
        ?>
    </table>
</body>
</html>