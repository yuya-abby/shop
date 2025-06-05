<?php
include "db.php";

// 處理刪除請求
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $delete_sql = "DELETE FROM car WHERE id = $delete_id";
    mysqli_query($link, $delete_sql);
    header("location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit;
}

// 檢查是否已登入
if (!isset($_SESSION["account"])) {
    echo "<script>alert('請先登入'); location.href='login.php';</script>";
    exit;
}

$account = mysqli_real_escape_string($link, $_SESSION["account"]);
$keyword = isset($_GET['keyword']) ? mysqli_real_escape_string($link, $_GET['keyword']) : '';

$sql = "SELECT * FROM car WHERE acc = '$account'";
if ($keyword !== '') {
    $sql .= " AND addproduct_name LIKE '%$keyword%'";
}
$sql .= " ORDER BY id DESC";

$res = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>噜噜咪賣貨便 - 購物車</title>
    <style>
/* 設定整體網頁背景為白色 */
body {
    background-color: #fff; /* 等同於 rgb(255,255,255) */
}

/* 頁首區域樣式 */
header {
    background-color: rgb(255, 236, 215); /* 淺橘背景 */
    text-align: center; /* 文字置中 */
    padding: 15px; /* 內距上下左右為 15px */
}

/* header 中的圖片樣式 */
header img {
    height: 200px; /* 高度固定為 200px */
    color: black; /* 雖然圖片本身不會用到文字顏色，但加上不會出錯 */
}

/* 頁面頂部橫幅樣式 */
.banner {
    background: rgb(255, 244, 180); /* 淺黃色背景 */
    padding: 8px; /* 內距為 8px */
    font-size: 20px; /* 字體大小 20px */
    font-weight: bold; /* 字體加粗 */
}

/* 導覽列中連結樣式 */
.navbar a {
    margin: 0 15px; /* 左右外距為 15px，讓連結之間有間隔 */
    font-size: 18px; /* 字體大小為 18px */
    text-decoration: none; /* 移除底線 */
}

/* 購物車表格樣式 */
.car-table {
    width: 100%; /* 表格寬度佔滿整個容器 */
    border-collapse: collapse; /* 合併邊框線，讓表格看起來更整齊 */
    table-layout: fixed; /* 固定欄寬，避免表格因內容變形 */
    margin-top: 20px; /* 與上方元素的距離 20px */
}

/* 表格的標題列與內容儲存格 */
.car-table th, .car-table td {
    padding: 15px; /* 內距為 15px */
    border-bottom: 1px solid #ccc; /* 底部加灰色線條作為分隔 */
    text-align: center; /* 文字置中對齊 */
}

/* 表格中的圖片樣式 */
.car-table img {
    width: 80px; /* 圖片寬度固定為 80px */
    height: auto; /* 高度自動等比例縮放 */
}

/* 共用按鈕樣式 */
.button {
    background: #ff6600; /* 橘色背景 */
    color: white; /* 白色文字 */
    padding: 10px; /* 內距 10px */
    border-radius: 5px; /* 圓角半徑 5px */
    text-decoration: none; /* 移除底線 */
    cursor: pointer; /* 滑鼠移到上面會變成手指形狀 */
    display: inline-block; /* 讓按鈕有寬高與內距 */
}

/* 固定在右下角的小區塊 */
.box_fixed {
    width: 100px; /* 寬度 100px */
    height: 100px; /* 高度 100px */
    position: fixed; /* 固定位置 */
    right: 0; /* 靠右對齊 */
    bottom: 0; /* 靠下對齊 */
    text-align: center; /* 內容文字置中 */
}

/* 全站共用的超連結樣式 */
a {
    text-decoration: none; /* 移除底線 */
    font-size: 18px; /* 字體大小為 18px */
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
        <img src="img/嚕嚕2.png" style="width:60%;">
    </header>

    <div class="banner">
        <form action="" method="get">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 200px; font-size:20px;" align="center"><a href="index-after.php">首頁</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="check-a.php">購買清單</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
            </tr>
        </table>
        </form>
    </div>

    <h1 align="center">購物車</h1>

    <form action="count.php" method="post">
        <table align="center" class="car-table">
            <tr>
                <th>選取</th>
                <th>商品圖片</th>
                <th>商品名稱</th>
                <th>數量</th>
                <th>小計</th>
                <th>操作</th>
            </tr>

            <?php
            $sql="SELECT * FROM `car` ORDER BY id DESC";
            $res=mysqli_query($link, $sql);
            $acc=$_SESSION["account"];
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    if($row["acc"]==$acc){
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='selected_items[]' value='{$row['id']}'></td>";
                    echo "<td><img src='" . htmlspecialchars($row['addproduct_img']) . "'></td>";
                    echo "<td>" . htmlspecialchars($row['addproduct_name']) . "</td>";
                    echo "<td><input type='number' value='" . intval($row['addproduct_count']) . "'></td>";
                    echo "<td>$" . htmlspecialchars($row['addproduct_money']) . "</td>";
                    echo "<td><a href='?delete={$row['id']}' onclick='return confirm(\"確定要刪除這個商品嗎？\")' class='button' style='background:#cc0000;'>刪除</a></td>";
                    echo "</tr>";
                }else{

                }
            }
            } else {
                echo "<tr><td colspan='6'>目前購物車沒有商品。</td></tr>";
            }
            ?>
        </table>

        <div class="box_fixed">
            <button type="submit" class="button">立即結帳</button>
        </div>

        <div style="text-align:center; margin-top: 20px;">
            <button type="button" onclick="toggleSelectAll()" class="button">全選 / 全不選</button>
        </div>
    </form>

    <script>
        function toggleSelectAll() {
            const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');
            const allChecked = Array.from(checkboxes).every(cb => cb.checked);
            checkboxes.forEach(cb => cb.checked = !allChecked);
        }
    </script>


</body>
</html>
