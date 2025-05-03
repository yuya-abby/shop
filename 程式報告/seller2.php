
<?php
include("db.php");
$name=$_POST["name"];
$account=$_POST['account'];
$password=$_POST["password"];
$type=$_POST["type"];

$sql="INSERT INTO `user`(`id`, `name`, `account`, `password`, `type`) VALUES (null,'$name','$account','$password','$type')";
$res=mysqli_query($link,$sql);
echo "<script>location.href='賣家.php'</script>";
?>