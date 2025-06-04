<?php
include ("db.php");

$id=$_GET["id"];

$sql="DELETE FROM `msg` WHERE `id`='$id'";
echo $sql;

mysqli_query($link,$sql);
echo "<script> location.href='a-msg.php'</script>;";

?>