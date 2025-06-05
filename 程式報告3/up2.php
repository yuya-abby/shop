<?php
include ("db.php");
$id=$_GET["id"];
$account=$_GET['account'];
$password=$_GET['password'];
$name=$_GET['name'];
$type=$_GET['type'];

$sql="UPDATE `user` SET `account`='$account',`password`='$password',
`name`='$name',`type`='$type' WHERE `id`='$id'";
echo $sql;
if(mysqli_query($link,$sql)){
    echo "<script> location.href='admin.php'</script>;";
}else{
    echo "<script> location.href='admin.php'</script>;";
}
?>




