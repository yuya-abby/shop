<?php
include ("db.php");

$pt_id=$_GET["pt_id"];

$sql="DELETE FROM `aa` WHERE `pt_id`='$pt_id'";
echo $sql;
mysqli_query($link,$sql);
echo "<script> location.href='a-commodity.php'</script>;";

?>            

