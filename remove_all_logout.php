<?php 
session_start();
$user_name=$_GET['log']+1;
echo $user_name;

$conn = new mysqli('localhost','root','','store');
$sql=" DELETE FROM orders WHERE Forg_ID='  ".$user_name." '";

$result = mysqli_query($conn, $sql);

 mysqli_multi_query($conn," Set @autoid:=0;
 UPDATE orders SET order_ID=@autoid :=(@autoid+1);
 ALTER TABLE orders AUTO_INCREMENT =1;");
header("Location:index.php");

?>