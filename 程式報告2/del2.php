<?php
include ("db.php");

$id=$_GET["id"];

$sql="DELETE FROM `user` WHERE `id`='$id'";
echo $sql;

mysqli_query($link,$sql);
echo "<script> location.href='admin.php'</script>;";

?>

