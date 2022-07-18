<?php 

session_start();
if(isset($_SESSION['userID']) && isset($_SESSION['user'])){
$ID_user=$_SESSION['userID'];
$_SESSION['user']="Guest";
unset($_SESSION['userID']);
// all the cart contents will be removed 

header("Location:remove_all_logout.php?log=".$ID_user);}
else {
    header("Location:index.php");
}
?>