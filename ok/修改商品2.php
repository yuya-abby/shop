<?php
include("db.php");

$c_id = $_POST["c_id"];
$c_name = $_POST["c_name"];
$c_text = $_POST["c_text"];
$c_money = $_POST["c_money"];
$pt_id = $_POST["pt_id"];

// 查詢商品種類名稱
$pt_result = mysqli_query($link, "SELECT pt_name FROM pro_type WHERE pt_id = '$pt_id'");
$pt_row = mysqli_fetch_assoc($pt_result);
$pt_name = $pt_row["pt_name"];

// 處理圖片上傳
$c_img = "";
if (!empty($_FILES["img"]["name"])) {
    $c_img = "img/" . $_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_name"], $c_img);
} else {
    // 保留原本圖片
    $old_result = mysqli_query($link, "SELECT c_img FROM aa WHERE c_id = '$c_id'");
    $old_row = mysqli_fetch_assoc($old_result);
    $c_img = $old_row["c_img"];
}

// 更新資料
$sql = "UPDATE aa 
        SET c_name='$c_name', c_text='$c_text', c_money='$c_money', c_img='$c_img', pt_id='$pt_id', pt_name='$pt_name' 
        WHERE c_id='$c_id'";
mysqli_query($link, $sql);


echo "<script>
    alert('修改成功');
    window.history.go(-2);
</script>";
exit;

?>
