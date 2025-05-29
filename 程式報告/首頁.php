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
        }
    </style>
</head>
<body>
<header>
<img src="img\嚕嚕2.png" autoplay muted loop style="width:60%;">
</header>
<div class="banner"><div class="navbar">
<table cellspacing="0" cellpadding="0" style="width:100%;">
        
        <td style="width: 4%; font-size:20px;" align="center"><a href="index.php" style="text-align: right;">
        <a href="首頁.php">首頁</a></td>
        <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" 
        value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  
        style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
        <td align="center" style="width:4%; font-size:19px;"><a href="car.php">購物車</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="會員登入.php">登入</a></td>
        <td align="center" style="width:4%; font-size:20px;"><a href="註冊.php">註冊</a></td>

    </tr>
</table>
</div></div>

    <div class="container">
    <?php
            $count=4;
            include("db.php");

            $sql = "SELECT * FROM `pro_type` WHERE 1";
            $result = mysqli_query($link, $sql);
            if(mysqli_num_rows($result)>0){
                while ($row = mysqli_fetch_assoc($result)) {
                    if($count % 4 == 0){
                        echo "<br>";
                    }
                    echo "<div class='product'>
                     
                       <h3><a href='" . $row["pt_path"] . ".php'>" . $row["pt_name"] . "</a></h3>

                        <h4>" . $row["pt_comment"] . "</h4>
                     
                        <div style='text-align: left;'>
                        <form action='刪除種類.php' method='POST' onsubmit='return confirm(\"確定要刪除這個商品嗎？\");'>
                            <input type='hidden' name='pt_id' value='" . $row['pt_id'] . "'>
                            <button type='submit'>刪除商品種類</button>
                        </form>
                        </div>
                       
                    <div >    
                    </div>
</div>";

                    $count++;
                   
                }
            }
        ?>

       <?php
      

       ?> 
    </div>

 
</div>
</body>
</html>