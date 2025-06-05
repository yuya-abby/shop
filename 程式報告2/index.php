<!DOCTYPE html>
<html lang="en">
<head>
<?php include("db.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便</title>
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
<img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 200px; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:100px; font-size:20px;">
                <a href="login.php?id=<?= $row['c_id'] ?>" onclick="alert('請先登入');">購物車
                </a>
                </td>
                <td align="center" style="width:100px; font-size:20px;"><a href="msg2.php">留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登入</a></td>
            </tr>
        </table>
        </div></div>
<div class="container">
    <?php
        
            $count = 4;
            $sql = "SELECT * FROM `pro_type` WHERE 1";
            if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
                $keyword = $_GET['keyword'];
                $sql.=" AND `pt_name` LIKE '%$keyword%'";
            }
            $result = mysqli_query($link, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='product'>
                        <img src='" . $row["img"] . "'>
                        <h3><a href='買家登入前.php?pt_id=" . $row["pt_id"] . "'>" . $row["pt_name"] . "</a></h3>
                        <h4>" . $row["pt_comment"] . "</h4>
                       
                      </div>";
                $count++;
            }
        }
    ?>
</div>
<!-- 將元素「固定在畫面某位置」，即使滾動頁面也不會移動
 將這個元素緊貼畫面底部
 將這個元素從畫面最左邊開始對齊
 讓這個元素寬度填滿整個螢幕（100% 的畫面寬度）
 背景色為淡黃色，用 RGB 格式指定
 文字置中對齊
 元素內部留白 10px，讓內容不會緊貼邊緣
 設定字體大小為 18 像素
 設定字體為「正常粗細」，不是粗體
 設定圖層順序，數值越大越在上層，確保這個橫幅不會被其他元素蓋住
  -->
</body>
</html>
