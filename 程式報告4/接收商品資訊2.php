<?php
include("db.php");

$id = $_POST['id']; // 如果是自增主鍵，這行可以移除
$name = $_POST['name'];
$total = $_POST['total'];
$product_list = $_POST['product_list'];
$order_date = $_POST['order_date'];
$account = $_POST['account'];
$payment = $_POST['payment'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$quantity = $_POST['quantity'];
$status = $_POST['status'] ?? '未出貨';  // 預設值未出貨
$subtotal = $_POST['subtotal'];

// 如果 id 是自增主鍵，可以去掉 id 欄位與對應變數
// 假設 id 是自增，則改成這樣：
$stmt = $link->prepare("INSERT INTO countmoney2 (name, total, subtotal, quantity, product_list, status, order_date, account, payment, address, phone) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// 綁定參數類型：
// s=string, i=integer, d=double(float)
// 這邊看起來 total, subtotal 可能是數字，quantity 是整數，其餘是字串
// 假設 total 與 subtotal 是浮點數，quantity 是整數，其它字串：
$stmt->bind_param("sddisssssss", $name, $total, $subtotal, $quantity, $product_list, $status, $order_date, $account, $payment, $address, $phone);

if($stmt->execute()){
    echo "訂單新增成功！";
} else {
    echo "錯誤：" . $stmt->error;
}
// 取出預處理語句執行後的錯誤訊息
$stmt->close();//關閉預處理語句物件 $stmt，釋放相關資源
$link->close();//關閉與資料庫的連線，也就是 $link 是你用 mysqli_connect() 或 new mysqli() 建立的資料庫連線
?>

