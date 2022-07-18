<?php
session_start();
$order_ID=$_GET['order_ID'];
$conn = new mysqli('localhost','root','','store');
$sql=" DELETE FROM orders WHERE order_ID='  ".$order_ID." '";

$result = mysqli_query($conn, $sql);

mysqli_multi_query($conn," Set @autoid:=0;
UPDATE orders SET order_ID=@autoid :=(@autoid+1);
ALTER TABLE orders AUTO_INCREMENT =1;");
header("Location:cart.php");
?>