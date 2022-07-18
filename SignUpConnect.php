<?php

	session_start();	
	$_SESSION['in_use']=0 ;

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$userName = $_POST['userName'];
	$email = $_POST['email'];
	$phoneNumber = $_POST['phoneNumber'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','store');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$query = "select *from signup where userName='$userName'";
		$result=mysqli_query($conn,$query);
		$count = mysqli_num_rows($result); // count number of rows present .. since this is a unique indentifier it should be 1 or 0

		if($count>0){
			//error --> user name already in use
			$_SESSION['in_use']=1;
			header("Location: SignUp.php?sugg=".$userName);
		}
		else{
		$stmt = $conn->prepare("INSERT INTO signup(firstName, lastName,userName,email,phoneNumber,password) values(?,?,?,?,?,?)");
		$stmt->bind_param("ssssis", $firstName,$lastName,$userName ,$email , $phoneNumber, $password);
		$execval = $stmt->execute();
		// echo $execval;
		// echo "Registration successfully...";
		$_SESSION['user']=$userName; //done

		$query2 = "select userID from signup where userName='$userName'";

		$result2=mysqli_query($conn,$query2);
		while ($row =mysqli_fetch_array($result2)) {
			$val=$row;
		}

		$_SESSION['userID']=(int)($val[0]-1);

		// $to='gamerZchad@gmail.com';
		// $subject='Confirmation Email';
		// $message='<h1>Hello, </h1>'.$userName.'<p> Thanks For Your Registration! You Can Start Making Purchases Now.';
		// $headers = 'From: webmaster@example.com' . "\r\n" .
    	// 'Reply-To: webmaster@example.com' . "\r\n" .
    	// 'X-Mailer: PHP/' . phpversion();
		// mail($to,$subject,$message,$headers);
		header("Location: mail_signup.php");
		$stmt->close();
		$conn->close();}
	
}

?>