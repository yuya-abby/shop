
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <title>訂單確認</title>
    <style>
body {
    font-family: Arial, sans-serif;  /* 使用 Arial 字體，無襯線風格 */
    background: #fff;                /* 白色背景 */
    text-align: center;              /* 全頁文字置中 */
    margin: 0;                       /* 移除頁面預設外距 */
    padding: 0;                      /* 移除頁面預設內距 */
}

header {
    background-color: rgb(255, 236, 215); /* 淺橘色背景 */
    padding: 15px;                        /* 上下 15px 內距 */
}

header img {
    height: 200px;              /* 標誌圖片高度 */
}

.banner {
    background: rgb(255, 244, 180); /* 淡黃色背景條 */
    padding: 10px 20px;            /* 內距：上下10px、左右20px */
    font-size: 15px;               /* 字體大小 */
    font-weight: bold;            /* 粗體字 */
}

.navbar table {
    width: 100%;                   /* 滿版寬度 */
    border-collapse: collapse;    /* 合併表格邊框 */
}

.navbar td {
    padding: 5px 10px;            /* 儲存格內距 */
    vertical-align: middle;       /* 垂直置中 */
}

.navbar a {
    text-decoration: none;        /* 取消底線 */
    font-size: 18px;              /* 字體大小 */
}

.navbar input[type="text"] {
    width: 200px;                 /* 輸入框寬度 */
    font-size: 18px;              /* 輸入字體大小 */
    padding: 5px;                 /* 內距 */
}

.navbar button {
    width: 100px;                 /* 按鈕寬度 */
    font-size: 18px;              /* 按鈕字體大小 */
    padding: 5px;                 /* 內距 */
    margin-left: 5px;             /* 左邊間距 */
    cursor: pointer;              /* 滑鼠變手形 */
}

.message {
    margin-top: 50px;             /* 上方留白距離 */
}

.btn {
    margin-top: 20px;             /* 與上方元素距離 */
    display: inline-block;        /* 行內塊級元素 */
    padding: 10px 20px;           /* 按鈕內距 */
    background-color: #ff6600;    /* 橘色背景 */
    color: white;                 /* 白色字體 */
    text-decoration: none;        /* 移除底線 */
    border-radius: 5px;           /* 圓角按鈕 */
}

a {
    text-decoration: none;        /* 全站連結無底線 */
    font-size: 18px;              /* 字體大小 */
    color: black;                 /* 黑色文字 */
}

    </style>
</head>
<body>

<?php include "db.php"; ?>
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
    <div class="navbar">
            <table>
                <tr>
                    <td style="width:100px; font-size:20px;" align="center"><a href="index-after.php">首頁</a></td>
                    <td style="width:100px; font-size:20px;" align="center"><a href="car.php">購物車</a></td>
                    <td style="width:100px; font-size:20px;" align="center"><a href="check-a.php">購物清單</a></td>
                    <td style="width:100px; font-size:20px;" align="center"><a href="msg-after2.php">留言板</a></td>
                    <td style="width:100px; font-size:20px;" align="center"><a href="login.php">登出</a></td>
                </tr>
            </table>
    </div>
</div>
<?php

$account = $_POST['account'];
$name = $_POST['buyer_name'];
$payment = $_POST['payment'];
$address = $_POST['address'];
$phone = $_POST['phone'];

$c_id = $_POST['c_id'];
$product_name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$total = $price * $quantity;
$product_list = $product_name . " x " . $quantity;
$sql = "INSERT INTO countmoney2 (account, name, payment, address, total, product_list, phone) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "ssssiss", $account, $name, $payment, $address, $total, $product_list, $phone);
$success = mysqli_stmt_execute($stmt);
?>

<div class="message">
    <?php if ($success): ?>
        <h3>訂單已成立，感謝您的購買！</h3>
        <p>商品：<?= $product_list ?></p>
        <p>總金額：NT$<?= number_format($total, 2) ?></p>
        <a href="index-after.php" class="btn">返回首頁</a>
    <?php else: ?>
        <h3>訂單儲存失敗，請稍後再試。</h3>
        <p><?= mysqli_error($link) ?></p>
    <?php endif; ?>
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
