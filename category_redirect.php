<?php 
session_start();
$_SESSION['prod_type']=$_GET['type'];
header("Location:product.php");
?>