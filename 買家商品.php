<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便</title>
    <style>
        body {
            background-color: rgb(255, 255, 255);
        }
        header {
            background-color: rgb(255, 236, 215);
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 30px;
        }
        header img {
            height: 200px;
        }
        .banner {
            background: rgb(255, 244, 180);
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
            height: 250px;
        }
        .product h3 {
            font-size: 20px;
            margin: 10px;
        }
        .product h4, .product h5 {
            margin: 5px;
        }
        .product h5 {
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
        a {
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
    <div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
            <tr>
                <td style="width: 200px; font-size:20px;" align="center"><a href="index-after.php">首頁</a></td>
                <td align="right">
                    <form method="get" action="search.php" style="display: inline-block;">
                        <input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>" style="width:200px; font-size:18px;">
                        <button type="submit" style="width:100px; font-size:18px;">搜尋🔍</button>
                    </form>
                </td>
                <td align="center" style="width:100px; font-size:20px;"><a href="car.php">購物車</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
                <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
            </tr>
        </table>
    </div>
</div>

<div class="container">

<?php
include("db.php");

if (isset($_GET["pt_id"])) {
    $pt_id = $_GET["pt_id"];

    // 使用預處理語句以防 SQL 注入
    $stmt = $link->prepare("SELECT * FROM `aa` WHERE pt_id = ?");
    $stmt->bind_param("s", $pt_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>
            <img src='" . $row["c_img"]. "'>
            <h3>" .$row["c_name"] . "</h3>
            <h4>" .$row["c_text"] . "</h4>
            <h5>價錢:$" . $row["c_money"] . "</h5>
            <form method='get' action='car3.php' style='display: inline-block;'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='submit' value='加入購物車' onclick=\"location.href='car3.php?id=" . $row["c_id"] . "'\" class='button'>
            </form>
            <form method='get' action='count-a.php' style='display: inline-block;'>
            <input type='hidden' name='c_id' value='".$row["c_id"]."'>
            <input type='submit' value='立即購買' onclick=\"location.href='count-a.php?id=" . $row["c_id"]. "'\" class='button'>
            </form>
            </div>";
    }

    $stmt->close();
}
?>

</div>

</body>
</html>
