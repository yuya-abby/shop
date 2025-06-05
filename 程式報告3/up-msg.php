<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <?php include("db.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便 - 修改留言</title>
    <style>
        body {

        background-color:rgb(255, 255, 255); /* 這是背景 */
        }

        header {
        background-color:rgb(255, 236, 215);
       /* color: white;*/
        /*padding: 15px;*/
        text-align: center;
        /*font-size: 30px;*/

        }
        header img{
        height: 200px;
     
        }
        .banner {
        background:rgb(255, 244, 180);
       /* text-align: right;*/
        padding: 7px;
        font-size: 15px;
        font-weight: bold;/*文字加粗（變粗體*/
        }
        .container {
            display: flex;
            flex-wrap: wrap;/*自動換行*/
            justify-content: center;/*justify-content主軸方向 預設為橫向）置中排列*/
            margin: 20px;/*這個元素的四個邊（上、右、下、左）各留 20 像素的空白空間*/
            
        }
        .product {
            background: white;/* 背景顏色設為 白色*/
            margin: 10px;/*外距（四邊）是 10px*/
            padding: 15px;/*內距是 15px 內部的內容（如圖片、標題、價格等）會與邊框保持 15px 距離，讓版面看起來不擁擠*/
            width: 250px;
            text-align: center;
            border-radius: 8px;/*圓弧化 8px*/
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product img {
            width: 100%;
            border-radius: 5px;
            height: 250px;
        }
        .product h3 {
            font-size: 20px;
            margin: 10px ;/*行間距*/
        }
        .product h4 {
            margin: 5px ;/*行間距*/
        }
        .product h5 {
            margin: 5px ;/*行間距*/
            color: #888;
        }
      
        .button {
            background: #ff6600;
            color: white;
            padding: 10px;
            border-radius: 5px;/*圓弧*/
            text-decoration: none;/*取消連結預設的「底線樣式*/
            margin-top: 10px;/*垂直間距為 10px */
        }
      
        a{
            text-decoration: none;
            font-size: 18px;
            color:black; 
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
    <img src="img/嚕嚕2.png" style="width:60%;">
</header>
<div class="banner">
    <table width="100%">
        <tr>
            <td align="center" style="width: 200px;"><a href="index-after.php">首頁</a></td>
            <td align="center" style="width: 100px;"><a href="login.php">登出</a></td>
        </tr>
    </table>
</div>

<div class="form-container">
<?php
$id = $_GET["id"];
$sql = "SELECT * FROM `msg` WHERE `id`=$id";
$res = mysqli_query($link, $sql);

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<form action='up-msg2.php' method='post' enctype='multipart/form-data'>";
        echo "<h2 align='center'>修改留言</h2>";
        echo "<table>";
        echo "<tr><td align='right'>標題：</td><td><input type='text' name='title' value='" . htmlspecialchars($row["title"], ENT_QUOTES) . "' required></td></tr>";
        echo "<tr><td align='right'>內文：</td><td><input type='text' name='text' value='" . htmlspecialchars($row["text"], ENT_QUOTES) . "' required></td></tr>";
        echo "<tr><td align='right'>圖片：</td><td><input type='file' name='img' accept='image/*'><br><small>目前檔案：<strong>" . htmlspecialchars($row['img']) . "</strong></small></td></tr>";
        echo "<tr><td colspan='2' class='current-img' align='center'><img src='msgimg/" . htmlspecialchars($row["img"]) . "' width='150'></td></tr>";
        echo "</table>";

        // 隱藏欄位
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<input type='hidden' name='add_time' value='" . $row["add_time"] . "'>";

        // 按鈕區
        echo "<div class='button-group'>";
        echo "<input type='submit' class='login-button' value='送出'>";
        echo "<a href='msg-after2.php' class='login-button'>返回</a>";
        echo "</div>";

        echo "</form>";
    }
} else {
    echo "<p>找不到留言資料</p>";
}
?>
</div>
    <div class="banner" 
    style="position: fixed; 
    bottom: 0; 
    left: 0; 
    width: 100%; 
    background-color: rgb(255, 244, 180);
    text-align: center; 
    padding: 10px; 
    font-size: 18px; 
    font-weight: normal; 
    z-index: 999;">
    嚕嚕咪賣貨便
</div>
</body>
</html>
