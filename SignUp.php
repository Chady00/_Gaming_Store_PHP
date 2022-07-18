<!DOCTYPE html>
<html>
  

<?php
session_start();
if (isset($_SESSION['in_use']) and $_SESSION['in_use'] == 1) {
    $_SESSION['in_use'] = 0; 
    $sugg=$_GET['sugg']."_12";
    $sugg2=", ".$sugg."_351";
    ?>
    <html>
      <div id="fadeout" class="alert alert-danger" style="font-size: 17px;" role="alert">
    <center><b> Username Already in Use.</b> &nbsp;Suggestions:&nbsp;<?php echo $sugg; echo $sugg2; ?></center>
    <style>
         #fadeout { 
        transition: 1s opacity;
        }
        </style>
        <script>
        window.onload = function() {
        window.setTimeout(fadeout, 6000); //8 seconds
        }
                
       function fadeout() {
       document.getElementById('fadeout').style.opacity = '0';
       }
      </script> 
    </div>
    </html>
<?php
}?>

</html>

<html lang="en" dir="ltr">

<head>
<meta charset="utf-8">
  <title>Create An Account</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" href="Sign_style.css?v=<?php echo time(); ?>">
</head>

<body>
<div class="center" style="height: 634px;  ">
    <h1>CREATE ACCOUNT</h1>
    <form action="SignUpConnect.php" method="post">
      <div class="txt_field">
        <input type="text" name="firstName" required>
        <span></span>
        <label>First Name</label>
      </div>
      <div class="txt_field">
        <input type="text"  name="lastName" required>
        <span></span>
        <label>Last Name</label>
      </div>
      <div name="username" class="txt_field">
        <input type="text"  name="userName" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="text"   name="email" required>
        <span></span>
        <label>Email</label>
      </div>
      <div class="txt_field">
        <input type="number" name="phoneNumber"  required >
        <span></span>
        <label>Phone Number</label>
      </div>
      <div class="txt_field">
        <input name ="password" type="password" required>
        <span></span>
        <label>Password</label>
      </div>

      <a href="SignIn.php" style="text-decoration:none; color: blueviolet;">
        <div class="pass" style="font-size: 16px; color: #3552A9  ;">
          Already have an account?
        </div>
      </a>
        <input type="submit"   name= " log" value="SIGN UP" style="margin-bottom: 20px;" >


  </div>

</body>

</html>
