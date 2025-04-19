<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>噜噜咪賣貨便</title>
    <style>
        body {

            background-color:rgb(240, 234, 234); /* 這是背景 */
        }
           
        header {
            background-color: #ff6600;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 30px;

        }
        .banner {
            background: #ffcc00;
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
        
    </style>
</head>
<body>
<header>噜噜咪賣貨便</header>
<form action="" method="get">
<div class="banner"><div class="navbar">
        <table cellspacing="0" cellpadding="0" style="width:100%;">
        
                <td style="width: 4%; font-size:20px;" align="center"><a href="index.php">首頁</a></td>
                <td align="right"><input type="text" name="keyword" placeholder="輸入商品名稱搜尋" value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>"  style="width:200px; font-size:18px;"><button type="submit"  style="width:100px; font-size:18px;">搜尋🔍</button></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="car.php">購物車</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="會員登入.php">登入</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="註冊.php">註冊</a></td>
                <td align="center" style="width:4%; font-size:20px;"><a href="會員登入.php">登出</a></td>
            </tr>
        </table>
        </div></div>
        </table>
        </div></div>
        <h2>介紹</h2>
        <img id="1" src="1.jpg"  style="width: 200px; height: 200px">
        <br>
        <br>
        <label for="">$________________________</label>
        <br>
        <br>
        <button onclick="changeImage('1.jpg')" style="width:100px; font-size:15px;">1</button>
        <button onclick="changeImage('2.jpg')" style="width:100px; font-size:15px;">2</button>
        <br>
        <input type="button" value="3" style="width:100px; font-size:15px;">
        <input type="button" value="4" style="width:100px; font-size:15px;">
        <br>
        <script>
        function changeImage(imageSrc) {
            document.getElementById('1').src = imageSrc;
        }
        </script>
        <br>
        <div class="quantity-container">

        </div>

        <br><br><br>
        <table>
            <tr>
                <td><input type="button" value="加入購物車" style="width:120px; font-size:20px;" onclick="location.href='car.php'"></td>
                <td><input type="button" value="直接購買" style="width:100px; font-size:20px;" onclick="location.href='check.php'"></td>
            </tr>
        </table>
        <!-- <?php
            function increaseQuantity() {
                if(!empty($_SESSION['quantity'])){
                    $quantity=$_SESSION['quantity'];
                }else{
                    $quantity = 1;
                }
                $quantity++;
                $_SESSION['quantity']=$quantity;
            }
        ?> -->
        <!-- <script>
        let quantity = 1;

        function increaseQuantity() {
            quantity++;
            document.getElementById("quantity").innerText = quantity;
        }

        function decreaseQuantity() {
            if (quantity > 1) {
                quantity--;
                document.getElementById("quantity").innerText = quantity;
            }
        }
    </script> -->
    </form>
</body>
</html>