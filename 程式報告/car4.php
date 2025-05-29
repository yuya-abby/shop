<?php
include "db.php";
    $id=$_GET['id'];
    $count=$_GET['buy_count'];
    $acc=$_SESSION['account'];
    $sql="SELECT * FROM `addproduct` WHERE `id` = '$id'";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $img=$row['img'];
            $name=$row['name'];
            $money=$row['money'];
        }
    }
    $money = $count * $money;
    $sql="INSERT INTO `car`(`id`, `addproduct_id`, `addproduct_name`, `addproduct_money`, `addproduct_count`, `addproduct_img`, `acc`) VALUES (null,'$id','$name','$money','$count','$img','$acc')";
    $res=mysqli_query($link,$sql);
    echo "<script>alert('新增成功')</script>";
    echo "<script>location.href='car.php'</script>";
?>