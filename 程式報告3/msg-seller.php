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
        
                <td style="width: 200px; font-size:20px;" align="center"><a href="首頁.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="check-a.php">接收訂單</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
            </tr>
        </table>
        </div></div>
        <?php
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sql = "SELECT * FROM msg WHERE parent_id IS NULL AND title LIKE '%" . mysqli_real_escape_string($link, $keyword) . "%' ORDER BY id DESC";
$res = mysqli_query($link, $sql);
            ?>
<h3>新增留言</h3>
    <form action="msg-seller3.php" method="post" enctype="multipart/form-data">
    <table border="1" style="width:500px; ">
        <tr>
            <td style="height:50px;">標題</td>
            <td><input type="text" name="title" require></td>
            
        </tr>
        <tr>
            <td style="height:100px;">內容</td>
            <td><input type="text" name="text" require></td>
        </tr>
        <tr>
            <td>圖片</td>
            <td><input type="file" style="height:100px;" name="img" require accept="image*/"></td>
        </tr>
        <tr>
            <td><input type="submit" value="新增"></td>
        </tr>
    </table>
</form>
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
