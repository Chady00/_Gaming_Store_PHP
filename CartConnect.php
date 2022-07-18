<?php 

session_start();

$rent = filter_input(INPUT_POST, 'a');
$_SESSION['rent']=$rent;

echo $_SESSION['userID'];

if(isset($_SESSION['userID']) ){
$_SESSION['added']=1;
$count = $_POST['input_count'];
$F_userName=  $_SESSION['customers'][$_SESSION['userID']][1];
$F_userID=  $_SESSION['customers'][$_SESSION['userID']][0];
$F_productID= $_SESSION['chosen_products'][$_SESSION['product']][8];

// Database connection
$conn = new mysqli('localhost','root','','store');
//check if username exists

$stmt = $conn->prepare("INSERT INTO orders(Forg_ID, Forg_user,Forg_ProductID,input_count,rent_or_not) values(?,?,?,?,?)");
		$stmt->bind_param("isiii", $F_userID,$F_userName, $F_productID, $count,$rent);
		$execval = $stmt->execute();
        $stmt->close();
		$conn->close();
		header("Location:sproduct.php?catg=".$_SESSION['chosen']);  ///category = chosen
}

else{
$_SESSION['flag']=0;
header("Location: SignIn.php");

}

