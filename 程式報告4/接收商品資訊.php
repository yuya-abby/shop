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
<header><img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;"></header>
      <div class="banner"><div class="navbar">
      <table cellspacing="0" cellpadding="0" style="width:100%;">
        
        <td style="width: 4%; font-size:20px;" align="center"><a href="首頁.php" style="text-align: right;">
        <a href="首頁.php">首頁</a></td>
        <td align="center" style="width:5%; font-size:20px;"><a href="msg-seller2.php">留言板</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登出</a></td>
    </tr>
        </table>
        </div></div>
</div></div> 
<h3 align="center">訂單資訊</h3>
<div class="container">
    <br>
    <?php 

    $sql = "SELECT * FROM `countmoney2` WHERE 1"; 
    $result = mysqli_query($link, $sql);  

    if (mysqli_num_rows($result) > 0) { 
        while ($row = mysqli_fetch_assoc($result)) { 
            echo "<form action='更新.php' method='POST' onsubmit='return confirm(\"確定要更新這筆訂單嗎？\");'>";
            echo "<table border='1' cellpadding='10' cellspacing='0' style='margin:20px auto; border-collapse: collapse; width: 90%;'>";
            echo "<tr><th colspan='2' style='background-color:#ffefcc;'>訂單編號 #" . htmlspecialchars($row['id']) . "</th></tr>";
            echo "<tr><td><strong>帳號：</strong></td><td>" . htmlspecialchars($row['name']) . "</td></tr>";
            echo "<tr><td><strong>總金額：</strong></td><td>NT$" . number_format($row['total']) . "</td></tr>";
            echo "<tr><td><strong>商品資訊：</strong></td><td>" . htmlspecialchars($row['product_list']) . "</td></tr>";
            echo "<tr><td><strong>訂購日期：</strong></td><td>" . htmlspecialchars($row['order_date']) . "</td></tr>";
            echo "<tr><td><strong>付款方式：</strong></td><td>" . htmlspecialchars($row['payment']) . "</td></tr>";
            echo "<tr><td><strong>地址：</strong></td><td>" . htmlspecialchars($row['address']) . "</td></tr>";
            echo "<tr><td><strong>電話：</strong></td><td>" . htmlspecialchars($row['phone']) . "</td></tr>";

            echo "<tr><td><strong>是否出貨：</strong></td><td>";
            echo "<select name='status' style='color:" . ($row['status'] == '已出貨' ? "green" : "orange") . "; font-weight:bold;'>";
            echo "<option value='未出貨'" . ($row['status'] == '未出貨' ? " selected" : "") . ">未出貨</option>";
            echo "<option value='已出貨'" . ($row['status'] == '已出貨' ? " selected" : "") . ">已出貨</option>";
            echo "</select>";
            echo "</td></tr>";


            echo "<tr><td colspan='2' align='center'>";
            echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
            echo "<button type='submit'>更新</button>";
            echo "</td></tr>";
            echo "</table>";
            echo "</form>";
        } 
    } else { 
        echo "<p align='center'>無資料。</p>"; 
    } 
    ?>
    <br>
</div>
</body>
</html>