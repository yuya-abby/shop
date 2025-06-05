<!DOCTYPE html>
<html lang="zh-Hant">
<head>
<?php 
    include "db.php"; 
?>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便</title>
    <style>
body {
    background-color: rgb(255, 255, 255); /* 頁面背景白色 */
    font-family: Arial, sans-serif;       /* 使用 Arial 無襯線字體 */
}

header {
    background-color: rgb(255, 236, 215); /* 淺橘色背景 */
    color: white;                         /* 字體顏色白色（建議調整，因為背景偏淺） */
    text-align: center;                   /* 置中對齊 */
    padding: 15px;                        /* 內距 15px */
    font-size: 30px;                      /* 標題文字大小 */
}

header img {
    height: 200px;                        /* 頁首圖片高度 */
}

.banner {
    background: rgb(255, 244, 180);       /* 淡黃色背景 */
    text-align: right;                    /* 右對齊內容 */
    padding: 8px;                         /* 內距 */
    font-size: 15px;                      /* 字體大小 */
    font-weight: bold;                    /* 字體加粗 */
}

.navbar table {
    width: 100%;                          /* 導覽列表格寬度為整頁 */
}

.navbar td {
    text-decoration: none;                /* 不顯示底線 */
    font-size: 18px;                      /* 字體大小 */
    color: black;                         /* 字體顏色 */
}

.container {
    display: flex;                        /* 彈性盒子排版 */
    justify-content: center;             /* 水平置中 */
    margin: 20px;                         /* 外距 */
}

/* 商品表格樣式 */
.product-table, .info-table {
    border-collapse: collapse;           /* 合併邊框 */
    width: 100%;                         /* 滿版寬度 */
    margin-bottom: 20px;                 /* 底部間距 */
}

.product-table th, .product-table td {
    border: 1px solid #ddd;              /* 灰色邊框 */
    padding: 10px;                       /* 內距 */
    text-align: center;                  /* 文字置中 */
}

/* 資訊表格樣式 */
.info-table td {
    padding: 8px;                        /* 內距略小一點 */
}

.submit-btn {
    background: #ff6600;                 /* 橘色背景 */
    color: white;                        /* 白色文字 */
    padding: 10px 20px;                  /* 上下10px、左右20px 內距 */
    border-radius: 5px;                  /* 圓角按鈕 */
    cursor: pointer;                     /* 滑鼠變成手型 */
    border: none;                        /* 移除預設按鈕邊框 */
}

a {
    text-decoration: none;               /* 移除連結底線 */
    font-size: 18px;                     /* 連結文字大小 */
    color: black;                        /* 黑色連結文字 */
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
    <img src="img/嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>
<div class="banner">
    <div class="navbar">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <td align="center"><a href="index-after.php">首頁</a></td>
                <td align="center"><a href="msg-after2.php">留言板</a></td>
                <td align="center"><a href="login.php">登出</a></td>
            </tr>
        </table>
    </div>
</div>

<h1 align="center">結帳資訊</h1>

<div class="container">
    <form action="count-b.php" method="post">
        <table class="product-table">
            <tr>
                <th>商品圖片</th>
                <th>商品名稱</th>
                <th>數量</th>
                <th>單價</th>
                <th>小計</th>
            </tr>
            <?php
            $c_id = $_GET["c_id"];
            $sql = "SELECT * FROM aa WHERE c_id = '$c_id'";
            $res = mysqli_query($link, $sql);

            if ($row = mysqli_fetch_assoc($res)) {
                $price = $row["c_money"];
                echo "<tr>";
                echo "<td><img src='" . $row['c_img'] . "' style='height:100px;'></td>";
                echo "<td>" . $row['c_name'] . "</td>";
                echo "<td><input type='number' name='quantity' value='1' min='1' onchange='updateTotal(this, {$price})'></td>";
                echo "<td>" . number_format($price, 2) . "</td>";
                echo "<td id='total'>" . number_format($price, 2) . "</td>";
                echo "</tr>";

                // 隱藏欄位
                echo "<input type='hidden' name='c_id' value='{$row["c_id"]}'>";
                echo "<input type='hidden' name='name' value='{$row["c_name"]}'>";
                echo "<input type='hidden' name='img' value='{$row["c_img"]}'>";
                echo "<input type='hidden' name='price' value='{$row["c_money"]}'>";
            } else {
                echo "<tr><td colspan='5'>找不到商品</td></tr>";
            }
            ?>
        </table>

        <h3>購買人資訊</h3>
        <table class="info-table">
            <?php
            $account = $_SESSION["account"];
            $sql = "SELECT * FROM user WHERE account = '$account'";
            $res = mysqli_query($link, $sql);
            $user = mysqli_fetch_assoc($res);

            echo "<tr><td>帳號：</td><td>{$user["account"]}</td></tr>";
            echo "<tr><td>姓名：</td><td>{$user["name"]}</td></tr>";
            echo "<tr><td>電話：</td><td>{$user["phone"]}</td></tr>";

            echo "<input type='hidden' name='account' value='{$user["account"]}'>";
            echo "<input type='hidden' name='buyer_name' value='{$user["name"]}'>";
            echo "<input type='hidden' name='phone' value='{$user["phone"]}'>";
            ?>
            <tr>
                <td>寄送地址：</td>
                <td><input type="text" name="address" required></td>
            </tr>
            <tr>
                <td>付款方式：</td>
                <td>
                    <select name="payment" required>
                        <option value="貨到付款">貨到付款</option>
                    </select>
                </td>
            </tr>
        </table>

        <div align="center">
            <input class="submit-btn" type="submit" value="確認結帳">
        </div>
    </form>

    <script>
        function updateTotal(input, price) {
            const qty = parseInt(input.value);
            const total = (qty * price).toFixed(2);
            document.getElementById("total").innerText = total;
        }
    </script>
</body>
</html>
