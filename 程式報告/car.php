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
        /* --- 略過，使用你的原始CSS樣式不變 --- */
        body {
            background-color: #fff;
        }
        header {
            background-color: rgb(255, 236, 215);
            text-align: center;
            padding: 15px;
        }
        header img {
            height: 200px;
            color:black;
        }
        .banner {
            background: rgb(255, 244, 180);
            padding: 8px;
            font-size: 20px;
            font-weight: bold;
        }
        .navbar a {
            margin: 0 15px;
            font-size: 18px;
            text-decoration: none;
        }
        .car-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 20px;
        }
        .car-table th, .car-table td {
            padding: 15px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }
        .car-table img {
            width: 80px;
            height: auto;
        }
        .button {
            background: #ff6600;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            display: inline-block;
        }
        .box_fixed {
            width: 100px;
            height: 100px;
            position: fixed;
            right: 0;
            bottom: 0;
            text-align: center;
        }
        a{
            text-decoration: none;
            font-size: 18px;
            color:black;
        }
    </style>
</head>
<body>
    <header>
        <img src="img/嚕嚕2.png" style="width:60%;">
    </header>

    <div class="banner">
        <form action="" method="get">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 200px; font-size:20px;" align="center"><a href="index-after.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="car.php">購物車</a></td>
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
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' name='selected_items[]' value='{$row['id']}'></td>";
                    echo "<td><img src='" . htmlspecialchars($row['addproduct_img']) . "'></td>";
                    echo "<td>" . htmlspecialchars($row['addproduct_name']) . "</td>";
                    echo "<td>" . intval($row['addproduct_count']) . "</td>";
                    echo "<td>$" . htmlspecialchars($row['addproduct_money']) . "</td>";
                    echo "<td><a href='?delete={$row['id']}' onclick='return confirm(\"確定要刪除這個商品嗎？\")' class='button' style='background:#cc0000;'>刪除</a></td>";
                    echo "</tr>";
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
