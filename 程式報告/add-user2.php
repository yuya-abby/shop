<?php
include ("db.php");
$account=$_GET["account"];  //接收資料
$password=$_GET["password"];
$password2=$_GET["password2"];
$name=$_GET["name"];
$email=$_GET["email"];
$phone=$_GET["phone"];
// $type=$_GET["type"];
if(($password == $password2) && (($account && $password && $password2 && $name && $email && $phone) != "")){
    $sql="INSERT INTO `user`(`id`, `account`, `password`, `name`, `email`, `phone`,`type`)
    VALUES (null,'$account','$password','$name','$email','$phone','u')";
    $res=mysqli_query($link,$sql);
    echo "<script> location.href='login.php'</script>;";
}else{
    echo "<script>alert('註冊錯誤(每隔欄位都必須有資料)')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>