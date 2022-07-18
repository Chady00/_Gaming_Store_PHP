<?php 

session_start();

$state = filter_input(INPUT_POST, 'state');
$postcode =$_POST['postcode'];
$address =$_POST['address'];



if(isset($_SESSION['userID']) ){
// $_SESSION['added']=1;
// $count = $_POST['input_count'];
// $F_userName=  $_SESSION['customers'][$_SESSION['userID']][1];
// $F_userID=  $_SESSION['customers'][$_SESSION['userID']][0];
// $F_productID= $_SESSION['chosen_products'][$_SESSION['product']][8];

$check=$_SESSION['userID']+1;

// Database connection
$conn = new mysqli('localhost','root','','store');
//check if username exists


$sql = "INSERT INTO checkout (Forg_ID , Forg_user, Forg_ProductID ,input_count,rent_or_not) SELECT Forg_ID, Forg_user, Forg_ProductID,input_count,rent_or_not FROM orders where Forg_ID='$check' ";
$result=mysqli_query($conn,$sql);
$stmt = $conn->prepare("UPDATE checkout SET state=?, post_code=?,address=? WHERE Forg_ID='$check'");
		$stmt->bind_param("sis", $state,$postcode, $address);
		$execval = $stmt->execute();
        $stmt->close();
		

        //clear the orders table since all data has been transfered to checkout table
        $sql3="DELETE FROM orders WHERE Forg_ID='  ".$check." '";

        $result3 = mysqli_query($conn, $sql3);
        
        mysqli_multi_query($conn," Set @autoid:=0;
        UPDATE orders SET order_ID=@autoid :=(@autoid+1);
        ALTER TABLE orders AUTO_INCREMENT =1;");
      
    }

    header("Location:mail.php");

?>