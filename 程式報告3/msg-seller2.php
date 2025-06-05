<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便 - 留言板</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #fff; 
        }
        header { 
            background-color: rgb(255, 236, 215); 
            text-align: center; padding: 15px; 
        }
        header img { 
            height: 200px; 
        }
        .banner { 
            background: rgb(255, 244, 180); 
            padding: 8px; 
            font-size: 15px; 
            font-weight: bold; 
        }
        a { 
            text-decoration: none;
            font-size: 18px;
            color:black; 
        }
        .container { 
            width: 80%; 
            margin: 30px auto; 
        }
        .message-box, .reply-box {
            border: 1px solid #aaa;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fafafa;
        }
        .reply-box { 
            margin-left: 40px; 
            background-color: #f0f0f0; 
        }
        .message-title { 
            font-size: 20px; 
            font-weight: bold; 
        }
        .message-meta { 
            font-size: 14px; 
            color: #666; 
            margin-bottom: 10px; 
        }
        .message-actions { 
            text-align: right; 
        }
        .message-actions input, .reply-toggle, .reply-submit {
            margin-left: 10px;
            padding: 5px 10px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .top-actions {
        text-align: center;
        margin: 20px 0;
        }
        .top-actions input {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .message-actions input:hover, .reply-toggle:hover, .reply-submit:hover { 
            background-color: #e65c00; 
        }
        .reply-form { 
            display: none; 
            margin-top: 10px; 
        }
        .reply-form textarea { 
            width: 100%; 
            height: 60px; 
        }
        .top-actions { 
            text-align: center; 
            margin-bottom: 20px; 
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
            <td align="center" style="width: 200px;"><a href="首頁.php">首頁</a></td>
            <td>
                <form action="msg-seller2.php" method="get" style="text-align:right;">
                    <input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" style="font-size:16px;">
                    <button type="submit">搜尋🔍</button>
                </form>
            </td>
            <td align="center" style="width: 100px;"><a href="接收商品資訊.php">接收訂單</a></td>
            <td align="center" style="width: 100px;"><a href="login.php">登出</a></td>
        </tr>
    </table>
</div>

<div class="container">


<?php
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sql = "SELECT * FROM msg WHERE parent_id IS NULL AND title LIKE '%" . mysqli_real_escape_string($link, $keyword) . "%' ORDER BY id DESC";
$res = mysqli_query($link, $sql);

function getReplies($link, $parent_id) {
    $reply_sql = "SELECT * FROM msg WHERE parent_id = $parent_id ORDER BY add_time ASC";
    return mysqli_query($link, $reply_sql);
}

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<div class='message-box'>";
        echo "<div class='message-title'>" . htmlspecialchars($row['title']) . "</div>";
        echo "<div class='message-meta'>發布者：" . htmlspecialchars($row['account']) . "｜時間：" . $row["add_time"] . "</div>";
        echo "<div class='message-content'>" . nl2br(htmlspecialchars($row['text'])) . "</div>";
        if (!empty($row['img'])) {
            echo "<div><img src='msgimg/" . htmlspecialchars($row['img']) . "' style='max-width:200px;'></div>";
        }

        echo "<div class='message-actions'>";
        if ($_SESSION["account"] == $row["account"]) {
            echo "<input type='button' value='修改' onclick=\"location.href='up-msg.php?id=" . $row['id'] . "'\">";
            echo "<input type='button' value='刪除' onclick=\"location.href='del.php?id=" . $row['id'] . "'\">";
        }
        echo "<button class='reply-toggle' onclick='toggleReply(" . $row['id'] . ")'>回覆</button>";
        echo "</div>";

        // 回覆表單
        echo "<div class='reply-form' id='reply-form-" . $row['id'] . "'>";
        echo "<form action='add-reply2.php' method='post'>";
        echo "<input type='hidden' name='parent_id' value='" . $row['id'] . "'>";
        echo "<textarea name='text' required placeholder='輸入回覆內容...'></textarea><br>";
        echo "<input type='submit' value='送出回覆' class='reply-submit'>";
        echo "</form>";
        echo "</div>";

        // 顯示回覆
        $replies = getReplies($link, $row['id']);
        while ($reply = mysqli_fetch_assoc($replies)) {
            echo "<div class='reply-box'>";
            echo "<div class='message-meta'>回覆者：" . htmlspecialchars($reply['account']) . "｜時間：" . $reply["add_time"] . "</div>";
            echo "<div class='message-content'>" . nl2br(htmlspecialchars($reply['text'])) . "</div>";
            if ($_SESSION["account"] == $reply["account"]) {
                echo "<div class='message-actions'>";
                echo "<input type='button' value='刪除' onclick=\"location.href='del6.php?id=" . $reply['id'] . "'\">";
                echo "</div>";
            }
            echo "</div>";
        }

        echo "</div>"; // message-box 結尾
    }
} else {
    echo "<p align='center'>查無留言資料。</p>";
}
?>
</div>

<script>
function toggleReply(id) {
    var form = document.getElementById("reply-form-" + id);
    form.style.display = form.style.display === "none" ? "block" : "none";
}
</script>
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
