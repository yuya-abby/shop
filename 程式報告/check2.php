<?php
include "db.php";
$c_name = $_SESSION["c_name"];
$payment_method = $_POST["payment"];
$quantities = $_POST["quantity"];
$subtotal=$_POST["subtotal"];

$sql="SELECT * FROM `countmoney` WHERE `id`='$id'";
$res = mysqli_query($link, $sql);

?>