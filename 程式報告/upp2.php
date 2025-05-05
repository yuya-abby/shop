<?php
include ("db.php");
$id=$_GET["id"];
$account=$_GET['account'];
$password=$_GET['password'];
$name=$_GET['name'];
$phone=$_GET['phone'];
$email=$_GET['email'];
$type=$_GET['type'];

$sql="UPDATE `user` SET `account`='$account',`password`='$password',
`name`='$name',`email`='$email',`phone`='$phone',`type`='$type' WHERE `id`='$id'";

echo $sql;
if(mysqli_query($link,$sql)){
    echo "<script> location.href='a-main.php'</script>;";
}else{
    echo "<script> location.href='a-main.php'</script>;";
}
?>




