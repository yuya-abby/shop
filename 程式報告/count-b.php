<?php
include "db.php";

$account = $_SESSION["account"];
$payment_method = $_POST["payment"];
$quantities = $_POST["quantity"];
$imgs = $_POST["img"]; // 確保這邊接收到的是陣列
foreach ($quantities as $c_id => $quantity) {
    $sql = "SELECT money, name FROM addproduct WHERE id='$c_id'";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($res);

    $price = $row["money"];
    $name = $row["name"];
    $subtotal = $price * $quantity;
    $img = $imgs[$c_id]; // ✅ 正確取得對應商品的圖片路徑

    $insert_sql = "INSERT INTO countmoney 
        (account, c_id, c_name, img, quantity, price, subtotal, payment_method, order_date)
        VALUES 
        ('$account', '$c_id', '$name', '$img', '$quantity', '$price', '$subtotal', '$payment_method', NOW())";

    if (!mysqli_query($link, $insert_sql)) {
        echo "錯誤：" . mysqli_error($link);
    }
}

// 完成後跳轉
$id = array_key_first($quantities); // 取第一個商品 ID
echo "<script>location.href='check.php?id=".$id."'</script>";
?>