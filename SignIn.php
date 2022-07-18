<!DOCTYPE html>
<html>

<?php

session_start();

$_SESSION['var']=0;
if(isset($_SESSION['cart_alert'])){
  unset($_SESSION['cart_alert']);?>
  <html>
  <div id="fadeout"class="alert alert-danger" style="font-size: 17px;" role="alert">
  <center>Sign-In to display Cart Contents</center>
  <style>
         #fadeout { 
        transition: 1s opacity;
        }
        </style>
        <script>
        window.onload = function() {
        window.setTimeout(fadeout, 2000); //8 seconds
        }
                
       function fadeout() {
       document.getElementById('fadeout').style.opacity = '0';
       }
      </script> 
  </div>
  </html>
  <?php

}
if(!isset($_SESSION['userID']) and isset($_SESSION['flag']) and $_SESSION['flag']==0){ 
  $_SESSION['flag']=1;$_SESSION['var']=0;  ?>
  <html>
  <div id="fadeout" class="alert alert-danger" style="font-size: 17px;" role="alert">
  <center>Must Sign-In to add to cart</center>
  <style>
         #fadeout { 
        transition: 1s opacity;
        }
        </style>
        <script>
        window.onload = function() {
        window.setTimeout(fadeout, 2000); //8 seconds
        }
                
       function fadeout() {
       document.getElementById('fadeout').style.opacity = '0';
       }
      </script> 
  </div>
  </html>
  <?php
}

else if (isset($_SESSION['wrong']) and $_SESSION['wrong'] == 1 and $_SESSION['var']!=1 ) {
    $_SESSION['wrong'] = 0; 
    $var=1;
    ?>
    <html>
    <div class="alert alert-danger" id= "fadeout" style="font-size: 17px;" role="alert">
    <center>Incorrect Username or Password</center>
    <style>
         #fadeout { 
        transition: 1s opacity;
        }
        </style>
        <script>
        window.onload = function() {
        window.setTimeout(fadeout, 2000); //8 seconds
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
  <title>SignIn</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="Sign_style.css?v=<?php echo time(); ?>">
</head>

<body>

  <div class="center" id="signIn">
      <a href="index.php" style="margin-left: 138px;margin-top: 200px; padding: 20px 0;"><img src="imgs/logo_small.png" alt=""  height="50"  ></a>

    <h1>Sign-In</h1>
    <form  action = "SignInConnect.php" method="post" >

      <div class="txt_field">
        <input type="text" name="userName" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name ="password" required>
        <label>Password</label>
        <span id="error"></span>
      </div>
      <a href="SignUp.php" style="text-decoration:none">
        <div class="pass" style="font-size: 16px;" >
          Don't have an account yet? <a href="SignUp.php" style="text-decoration:none"> Sign up</a>
        </div>
      </a>
        <input type="submit" value="Login" style="margin-bottom: 20px;">


    </form>
  </div>

</body>

</html>
