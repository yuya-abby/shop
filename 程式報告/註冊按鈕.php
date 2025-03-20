<?php
include ("db.php");
$account=$_GET["account"];  //接收資料
$password=$_GET["password"];
$name=$_GET["name"];
$password2=$_GET["password2"];

$sql="SELECT * FROM `user` WHERE 1";
$res=mysqli_query($link,$sql);
if(mysqli_num_rows($res)>0){
    $sql="SELECT * FROM `user` WHERE `account`='$account' and `password`='$password'and `name`='$name'and `password2`='$password2'";
    $res=mysqli_query($link,$sql);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_assoc($res)){
            $_SESSION['account']=$row['account'];
            $_SESSION['name']=$row['name'];
        }
    }else{
       header("location:會員登入.php");
    }
}else{
    header("location:會員登入.php");
}
?>