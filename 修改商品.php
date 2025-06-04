<!DOCTYPE html>
<html lang="en">
<head >
<?php
include("db.php");
$c_id = $_GET["c_id"];
$sql = "SELECT * FROM aa WHERE c_id = '$c_id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>
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
<header>
<img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>

<div class="banner">
    <table cellspacing="0" cellpadding="0" style="width:100%;">
        <tr>
            <td align="center" style="width: 4%; font-size:20px;"><a href="首頁.php">首頁</a></td>
            <td align="center" style="width: 4%; font-size:20px;"><a href="首頁.php">返回</a></td>
            <td align="right">
                <input type="text" name="keyword" placeholder="輸入商品名稱搜尋" style="width:200px; font-size:18px;">
                <button type="submit" style="width:100px; font-size:18px;">搜尋🔍</button>
            </td>
            <td align="center" style="width:100px; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
            <td align="center" style="width:100px; font-size:20px;"><a href="login.php">登出</a></td>
        </tr>
    </table>
</div>

<h3 align="center">修改商品</h3>

<form action="修改商品2.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="c_id" value="<?php echo $row['c_id']; ?>">
    <table border="1" style="width:500px;" align="center">
        <tr>
            <td align="center">圖片</td>
            <td>
                <input type="file" name="img" style="height:100px;">
                <br>目前圖片：<img src="<?php echo $row['c_img']; ?>" width="100">
            </td>
        </tr>
        <tr>
            <td align="center">商品種類</td>
            <td>
                <select name="pt_id" required>
                    <option value="">請選擇商品種類</option>
                    <?php
                    $sql_type = "SELECT pt_id, pt_name FROM pro_type";
                    $res_type = mysqli_query($link, $sql_type);
                    while ($type = mysqli_fetch_assoc($res_type)) {
                        $selected = ($type['pt_id'] == $row['pt_id']) ? "selected" : "";
                        echo "<option value='{$type['pt_id']}' $selected>{$type['pt_id']} - {$type['pt_name']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center"  style="height:100px;">商品名稱</td>
            <td><input type="text" name="c_name" value="<?php echo $row['c_name']; ?>" required></td>
        </tr>
        <tr>
            <td align="center"  style="height:100px;">商品說明</td>
            <td><input type="text" name="c_text" value="<?php echo $row['c_text']; ?>" required></td>
        </tr>
        <tr>
            <td align="center"  style="height:100px;">商品價錢</td>
            <td><input type="text" name="c_money" value="<?php echo $row['c_money']; ?>" required></td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input type="submit" value="修改">
                <input type="reset" value="清除">
            </td>
        </tr>
    </table>
</form>

</body>
</html>