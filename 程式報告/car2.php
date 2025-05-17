<?php
    $addproduct_id = 'addproduct_id';
    $addproduct_name = 'addproduct_name';
    $addproduct_money = 'addproduct_money';
    $addproduct_count = 'addproduct_count';
    $addproduct_img='addproduct_img';
    
    $conn = new mysqli($addproduct_id,$addproduct_name,$addproduct_money, $addproduct_count,$addproduct_img);
    
    if ($conn->connect_error) {
        die("連線失敗: " . $conn->connect_error);
    }
?>