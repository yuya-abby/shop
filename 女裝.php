<!DOCTYPE html>
<html lang="en">
<head>
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
<body>
<header><img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;"></header>
      <div class="banner"><div class="navbar">
      <table cellspacing="0" cellpadding="0" style="width:100%;">
        
        <td style="width: 4%; font-size:20px;" align="center"><a href="index.php" style="text-align: right;">
        <a href="首頁.php">首頁</a></td>
        <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>      
        <td align="center" style="width:5%; font-size:20px;"><a href="msg-after2.php">留言板</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="login.php">登出</a></td>
        
    </tr>
        </table>
        </div></div>
</div></div>
    
    <div class="container">

        <?php
            $count=4;
            include("db.php");
            $pt_id = $_GET["pt_id"];
            $sql = "SELECT * FROM `aa` WHERE pt_id = '$pt_id'";

            $result = mysqli_query($link, $sql);
            if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)) {
                    if($count % 4 == 0){
                        echo "<br>";
                    }
                    echo "<div class='product'>
                        <img src='" . $row["c_img"] . "'>
                        <h4>" . $row["c_name"] . "</h4>
                        <h4>" . $row["c_text"] . "</h5>
                        <h5>價錢:$" . $row["c_money"] . "</h4>
                        <div style='text-align: left;'>
                        <form action='刪除商品.php' method='POST' onsubmit='return confirm(\"確定要刪除這個商品嗎？\");'>
                            <input type='hidden' name='c_id' value='" . $row['c_id'] . "'>
                            <button type='submit' >刪除商品</button>
                        </form>
                            </div>
                       <div style='text-align: right;'>
                        <a href='修改商品.php?c_id=" . $row['c_id'] . "'>修改商品</a>
                        </div>
                        </div>";
                    $count++;
                   
                }
            }
        ?>
 
    </div>
<div style="position: absolute; bottom: 0; right: 0;">
    <a href="新增商品.php">新增商品</a>
    <br>
</div>
</body>
</html>
