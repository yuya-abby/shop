<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便</title>
    <style>
/* 整體網頁背景設為白色 */
body {
    background-color: rgb(255, 255, 255); /* 這是背景 */
}

/* 頁首樣式 */
header {
    background-color: rgb(255, 236, 215); /* 淺橘色背景 */
    /* color: white; */ /* 註解掉：原本是白色文字 */
    /* padding: 15px; */ /* 註解掉：原本是上下內距 */
    text-align: center; /* 內容置中對齊 */
    /* font-size: 30px; */ /* 註解掉：原本文字大小 */
}

/* header 裡圖片的樣式 */
header img {
    height: 200px; /* 圖片固定高度為 200px */
}

/* 頂部橫幅樣式 */
.banner {
    background: rgb(255, 244, 180); /* 淺黃色背景 */
    /* text-align: right; */ /* 註解掉：原本文字靠右 */
    padding: 7px; /* 內距 7px */
    font-size: 15px; /* 字體大小為 15px */
    font-weight: bold; /* 文字加粗（變粗體） */
}

/* 商品區塊容器 */
.container {
    display: flex; /* 使用 Flexbox 排版 */
    flex-wrap: wrap; /* 內容超出時自動換行 */
    justify-content: center; /* 內容置中排列 */
    margin: 20px; /* 外距為 20px */
}

/* 每一個商品卡片的樣式 */
.product {
    background: white; /* 背景顏色設為白色 */
    margin: 10px; /* 外距（四邊）是 10px */
    padding: 15px; /* 內距是 15px，讓內部內容與邊框有空間 */
    width: 250px; /* 卡片寬度固定為 250px */
    text-align: center; /* 文字置中 */
    border-radius: 8px; /* 邊框圓角 8px */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* 輕微陰影效果 */
}

/* 商品圖片樣式 */
.product img {
    width: 100%; /* 圖片寬度為容器寬度的 100% */
    border-radius: 5px; /* 圓角邊框 */
    height: 250px; /* 圖片高度固定為 250px */
}

/* 商品標題 h3 樣式 */
.product h3 {
    font-size: 20px; /* 字體大小 20px */
    margin: 10px; /* 外距為 10px（調整與上下項目的距離） */
}

/* 商品副標題 h4 樣式 */
.product h4 {
    margin: 5px; /* 外距為 5px（更緊湊） */
}

/* 商品說明文字 h5 樣式 */
.product h5 {
    margin: 5px; /* 外距為 5px */
    color: #888; /* 字體顏色為淺灰色，通常用於次要資訊 */
}

/* 購物按鈕樣式 */
.button {
    background: #ff6600; /* 橘色背景 */
    color: white; /* 文字為白色 */
    padding: 10px; /* 內距 10px */
    border-radius: 5px; /* 圓角 5px */
    text-decoration: none; /* 取消預設底線 */
    margin-top: 10px; /* 與上方元素的間距為 10px */
}

/* 所有超連結的預設樣式 */
a {
    text-decoration: none; /* 移除底線 */
    font-size: 18px; /* 字體大小 18px */
    color: black; /* 黑色文字 */
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
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 200px; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登入</a></td>
            </tr>
        </table>
        </div></div>


<h1 align="center">註冊</h1>
<form action="add-user2.php" method="post">
<table align="center" border="1" cellpadding="4">
    <tr><th>欄位</th><th>資料</th></tr>
    <tr>
        <td>帳號:</td>
        <td><input type="text" name="account" required></td>
    </tr>
    <tr>
        <td>姓名:</td>
        <td><input type="text" name="name" required></td>
    </tr>
    <tr>
        <td>密碼:</td>
        <td><input type="password" name="password" required></td>
    </tr>
    <tr>
        <td>確認密碼:</td>
        <td><input type="password" name="password2" required></td>
    </tr>
    <tr>
        <td>信箱:</td>
        <td><input type="email" name="email" required></td>
    </tr>
    <tr>
        <td><strong>電話號碼：</strong></td>
        <td>
        <input type="text" name="phone" pattern="09\d{2}-\d{3}-\d{3}" placeholder="0912-345-678" required>
        </td>
    </tr>
    <tr>
        <td>使用者身分：</td>
        <td>
            <select name='type' required>
                <option value='o'>賣家</option>
                <option value='u' selected>買家</option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" value="確定">
            <input type="button" value="返回" onclick="location.href='login.php'">
        </td>
    </tr>
</table>
<p style="font-size: 13px;" align="center">如果已經有帳號請按返回</p>
</form>

</body>
</html>
