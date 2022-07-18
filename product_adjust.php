<?php 
session_start();
$_SESSION['product']= $_GET['index'];
$var=$_GET['index2'];

header("Location:sproduct.php?catg=".$var);
?>