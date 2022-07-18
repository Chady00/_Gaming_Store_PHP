<?php 

session_start();
$_SESSION['product']= $_GET['index']; //set product category for no reason
$var=$_GET['index2']; // send which tag was pressed no reason 
$id=$_GET['u']; // send product ID will be used

header("Location:sproduct_search.php?catg=".$var."&id=".$id);


?>