<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['order_id'])) {
    $order_id = (int)$_POST['order_id'];
    $account = $_SESSION["account"];

    $check = mysqli_query($link, "SELECT * FROM countmoney WHERE id = '$order_id' AND account = '$account'");
    if (mysqli_num_rows($check) > 0) {
        $update = mysqli_query($link, "UPDATE countmoney SET status='已完成' WHERE id='$order_id'");
        if ($update) {
            echo "<script>alert('訂單已標記為完成'); location.href='check.php';</script>";
        } else {
            echo "更新失敗：" . mysqli_error($link);
        }
    } else {
        echo "<script>alert('非法操作'); location.href='check.php';</script>";
    }
}
?>
