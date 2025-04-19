<?php
include ("db.php");

$id=$_POST["id"];

$sql="DELETE FROM `msg` WHERE `id`='$id'";

mysqli_query($link,$sql);
echo "<script> location.href='msg2.php'</script>;";

?>

