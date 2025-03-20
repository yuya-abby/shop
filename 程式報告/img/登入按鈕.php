<?php
include ("db.php");
$account=$_GET["account"];  //接收資料
$password=$_GET["password"];

$sql="SELECT * FROM `user` WHERE 1";
$res=mysqli_query($link,$sql);
if(mysqli_num_rows($res)>0){
    $sql="SELECT * FROM `user` WHERE `account`='$account' and `password`='$password'";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $_SESSION['account']=$row['account'];
            $_SESSION['name']=$row['name'];
             if($row["type"]== "A"){
                header("location:main.php"); //管理員
            }else{
                header("location:main.php"); //使用者
            }
        }
    }else{
       header("location:index.php");
    }
}else{
    header("location:index.php");
}
?>