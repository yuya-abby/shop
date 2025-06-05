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
        
                <td align="center" style="width:100px; font-size:20px;"><a href="a-main.php">首頁</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="a-msg.php">留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
            </tr>
        </table>
        </div></div>
    <h1 align="center">修改帳號、權限</h1>
 
        <table align="center" border="1">
        <form action="up2.php" method="get">
            <?php
            $sqll = "SELECT * FROM `pro_type` WHERE 1";
            if(isset($_GET['keyword']) && $_GET['keyword'] != ''){
                $keyword = $_GET['keyword'];
                $sqll.=" AND `pt_name` LIKE '%$keyword%'";
            }
            $result = mysqli_query($link, $sqll);
            
            $id=$_GET['id'];
            $sql="SELECT * FROM `user` WHERE `id`='$id'";
            $res=mysqli_query($link,$sql);
            if(mysqli_num_rows($res)>0){
                while($row=mysqli_fetch_assoc($res)){
                    echo "<form action='up2.php' method='post'>";
                    echo "<tr>";
                    echo "<td>帳號</td>";
                    echo "<td><input type='account' name='account' value='".$row['account']."'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>密碼</td>";
                    echo "<td><input type='text' name='password' value='".$row['password']."'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>姓名</td>";
                    echo "<td><input type='name' name='name' value='".$row['name']."'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>電話</td>";
                    echo "<td><input type='phone' name='phone' value='".$row['phone']."'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>email</td>";
                    echo "<td><input type='email' name='email' value='".$row['email']."'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>權限</td>";
                    echo "<td>
                        <select name='type'>
                            <option value='a'" . ($row['type'] == 'a' ? ' selected' : '') . ">管理員</option>
                            <option value='o'" . ($row['type'] == 'o' ? ' selected' : '') . ">賣家</option>
                            <option value='u'" . ($row['type'] == 'u' ? ' selected' : '') . ">買家</option>
                        </select>
                    </td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td></td>";
                    echo "<td>
                        <input type='hidden' name='id' value='".$row['id']."'>
                        <input type='submit' value='修改' style='background-color:red; color:white;'>
                        </td>";
                    echo "</tr>";
                    
                    echo "</form>";



                }
            }
            ?>
            </form>
        </table>

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