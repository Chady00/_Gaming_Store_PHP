
<?php

session_start();
$_SESSION['wrong'] = 0;

$userName = $_POST['userName'];
$password = $_POST['password'];

$_SESSION['user'] = $userName;

// Database connection
$conn = new mysqli('localhost', 'root', '', 'store');
//check if username exists
$query = "select *from signup where userName='$userName'  and password='$password'";
$query2 = "select userID from signup where userName='$userName'";

$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
while ($row = mysqli_fetch_array($result2)) {
    $val = $row;
}

$_SESSION['userID'] = (int) ($val[0]);

$count = mysqli_num_rows($result); // count number of rows present .. since this is a unique indentifier it should be 1 or 0
if ($count > 0) {
    header("Location: index.php");
} else {
    $_SESSION['user'] = "Guest";
    $_SESSION['wrong'] = 1;
    unset($_SESSION['userID']);
    header("Location: SignIn.php");
}

?>