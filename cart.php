
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"> -->
    <script src="https://kit.fontawesome.com/89f7189b0f.js" crossorigin="anonymous"></script>

    <title>Gamers Patch</title>
</head>
    <body>
    
        <div id="header"   class="fixed top ">
            <a href="index.php"><img src="imgs/logo_small.png" alt=""  height="50"></a>

            <div>
                <ul id="navbar">
                    <li><a  href="index.php">Home</a></li>
                    <li><a  href="category_redirect.php?type=0" >Products</a></li>
                    <li id="cat"><a href="categories.php">Categories <i class="fa-solid fa-caret-down"></i></a>
                        <div class="small-menu">
                            <ul>
                            <li><a href="category_redirect.php?type=1">Playstation</a></li>
                            <li><a href="category_redirect.php?type=2">XBOX</a></li>
                            <li><a href="category_redirect.php?type=3">Consoles</a></li>
                            <li><a href="category_redirect.php?type=4">Accessories</a></li>
                            </ul>
                        </div> 
    
                    </li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li>               
                    <form action="search.php" role="search" method="post" id="form">
                    <input type="text" id="query" name="q" placeholder="Search..." aria-label="Search through site content">
                    <button>
                    <svg viewBox="0 0 1024 1024"><path class="path1" d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path></svg>
                    </button>
                </form></li>
                    
                    <li><a href="cart.php" title="Shopping Cart"  class="active"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    <li><a href="SignIn.php" title="login"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                    <li><a href="logout.php" title="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                    <p style="font-weight: bold; color: #922D4E  ;">
                <?php
                session_start();
                if (isset($_SESSION['user']) and $_SESSION['user']!="Guest" ) {
                echo str_repeat('&nbsp;', 3)."Welcome, " .$_SESSION['user'];
                }
                else{
                $_SESSION['cart_alert']=0;
                header("location:SignIn.php?");
                }
                ?>
                </p>

                </ul>
            </div>
            <div id="mobile">
                <i id="bar" class="fas fa-outdent"></i>
            </div>
        </div>
        <br>
        <br>
        <?php 

//check if email was sent successfully --> and returned back to cart


if(isset($_SESSION['eh']) and  $_SESSION['eh']==1){
    $_SESSION['eh']=0; ?>
    <html>
    <div id="fadeout"class="alert alert-danger" style="   font-size: 17px;" role="alert">
    <center>Can't proceed without filling the cart. Check out our new collection.</center>
    <style>
           #fadeout { 
          transition: 1s opacity;
          }
          </style>
          <script>
          window.onload = function() {
          window.setTimeout(fadeout, 3500); //8 seconds
          }
                  
         function fadeout() {
         document.getElementById('fadeout').style.opacity = '0';
         }
        </script> 
    </div>
    </html> <?php
}



if(isset($_SESSION['mail_sent']) and  $_SESSION['mail_sent']==1){
    $_SESSION['mail_sent']=0; ?>
    <html>
    <div id="fadeout"class="alert alert-success" style="   font-size: 17px;" role="alert">
    <center>Order has been placed successfuly. A confirmation email was sent to you.</center>
    <style>
           #fadeout { 
          transition: 1s opacity;
          }
          </style>
          <script>
          window.onload = function() {
          window.setTimeout(fadeout, 3500); //8 seconds
          }
                  
         function fadeout() {
         document.getElementById('fadeout').style.opacity = '0';
         }
        </script> 
    </div>
    </html> <?php
}
?>
        
        <h1 style="margin-left: 130px; font-weight: 700;  " class="pb-3">Cart</h1>
        <hr style="    margin: 5px 0px;
        border: 0;
        color: #000000;
        opacity: 50;
        border-top: 1px solid #000000;" >

        <!-- 
            <section id="banner1" class="section-m1" >
            </section> -->

        <section id="cart" class="section-p1">
            <table width="100%">
                <thead>
                    <tr>
                        <td>Remove</td>
                        <td>Image</td>
                        <td>Product</td>
                        <td>Buy Price</td>
                        <td>Rent Price</td>
                        <td>Quantity</td>
                        <td>Order</td>
                        <td>Subtotal Buy</td>
                        <td>Subtotal Rent</td>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $prod_id=(int)( $_SESSION['userID']+1);
                $conn = new mysqli('localhost','root','','store');
                $stmt = $conn->prepare("SELECT Forg_ProductID,input_count,order_ID,rent_or_not FROM orders WHERE Forg_ID=?"); // get product IDs of orders made by user
                $stmt->bind_param("s", $prod_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $num_rows = mysqli_num_rows($result);
                if($num_rows>0){
                while($row =mysqli_fetch_array($result))  {
                    $IDs []=$row;
                }
                
                //products IDs are stored in buy now
                //print_r($IDs);
                // for each productID : get the equivalent productname
                $i=0;
                
                foreach ($IDs as $rows1):

                $stmt = $conn->prepare("SELECT name,price,rent_price,img FROM buy WHERE ID=?"); // get product IDs of orders made by user
                $stmt->bind_param("s", $rows1[0]); // get the name,price of each ID = $rows1[$i] aka 1st , 2nd , 3rd ID
                $stmt->execute();
                $result = $stmt->get_result();
                while($row5 =mysqli_fetch_array($result))  {
                $res []=$row5; // store name,price in $res

                }
                endforeach;
         
                //display all results needed
                $i=0;
                $total_buy=0;
                $total_checkout_buy=0;
                $total_rent=0;
                $total_checkout_rent=0;
                $length = count($IDs);
                
                foreach ($IDs as $rows2) :
                 
                $total_buy=$res[$i][1]*$IDs[$i][1]; 

                if($IDs[$i][3]==0) {$total_checkout_buy+=$res[$i][1]*$IDs[$i][1];}
                else {$total_checkout_buy+=$res[$i][2]*$IDs[$i][1];}
                
                $total_rent=$res[$i][2]*$IDs[$i][1]; ?>
                <tr class="item_row">
                <td><a href='remove_from_cart.php?order_ID=<?php echo $IDs[$i][2]?>'><i class="far fa-times-circle"></i></a></td>
                <td> <img src="imgs/display/<?php echo $res[$i][3] ?>.jpg" alt="consile1"></td>
                <td> <?php echo $res[$i][0];    //name          ?></td>
                <td><b><?php echo $res[$i][1];   //price      ?></b> LE</td>
                <td><b> <?php echo $res[$i][2];        //rent ?></b> LE/Week</td>
                <td> <?php echo $IDs[$i][1];      //count  ?></td>
                <td ><?php if($IDs[$i][3]==0){echo "To Buy" ;} else {echo "To Rent";}//rented or bought? ?></td> 
                <td><?php if($IDs[$i][3]==0){echo $total_buy;}  else {echo "—";}//total ?></td>
                <td ><?php if($IDs[$i][3]==1){echo $total_rent;}  else {echo "—";}  //total ?></td> 
                </tr>
                
                <?php $i=$i+1; endforeach;}

                else{ ?>
                    <td > <?php echo "No Items Where Selected. Check Out Our New Merch Collection"    //image    ?></td> <?php
                }
                ?>
                </tbody>
            </table>

        </section>       
             <hr>
        <section id="cart-add">
            
            <div id="subtotal">
                <h3>Cart Totals-Buy</h3>
                <table>
                    <tr>
                        <td>Cart Subtotal</td>
                        <td><?php if($num_rows>0){echo $total_checkout_buy; } else{echo " 0 ";}//total?> LE</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>Additional 5%</td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong><?php if($num_rows>0){echo ($total_checkout_buy+($total_checkout_buy*0.05));} else{echo " 0 ";}//total?></strong> LE</td>
                    </tr>
                </table>

                <?php if($num_rows>0) {?><a href="checkout.php"><button>Proceed to Checkout</button></a><?php } else{   ?>
                <a href="adjust_for_error.php"><button>Proceed to Checkout</button></a><?php }?>
            </div>

        </section>
        <br>
        <br>
        <br>
      
        <footer class="section-p1" id="footer" style="background-color: #232f3f; height: 250px;">
        <div class="col-1">
            <img class="logo" src="imgs/logo_checkout.png" alt="logo of the website" style="width: 100px;height: 50px;">

        </div>
        <div class="col-2.5">
            <h4 style="color: #fb3958;" ><b>Contact</b></h4>
            <p><strong>Address: 1 ElsarayatSt.,Abbaseya,Cairo</strong></p>
            <p><strong>Phone: 01223682456</strong></p>
            <p><strong>Working hours: 09:00 till 22:00</strong></p>

            <!-- <div class="follow">
                <h4 style="color: white;">follow us</h4>
                <div class="icon"style="margin-left: -5px; margin-top: -20px;"  >
                    <i class="fa fa-facebook-f" style="font-size:38px;color:#385898"></i>
                    <i class="fa fa-twitter" style="font-size:38px;color:rgb(29, 155, 240)"></i>
                    <i class="fa fa-instagram" style="font-size: 38px;color:#fb3958"></i>

                </div>

            </div> -->

        </div>
        <div class="col-2.5">
        <h4 style="color: white;font-family: verdana; font-size: 20px;"><b>Let Us Help You</b></h4>
        <a href="index.php"  style="color:white; text-decoration: none; font-family: verdana;">Home</a>
        <br> 
        <a href="category_redirect.php?type=0"  style="color:white; text-decoration: none;font-size: 14px; font-family: verdana;">Products</a>
        <br> 
        <a href="about.php"  style="color:white; text-decoration: none;font-family: verdana;">About</a>
        <br> 
        <a href="contact.php"  style="color:white; text-decoration: none;font-family: verdana;">Contact</a>
        <br> 
        </div>
        <div class="col-2.5">
        <h4 style="color: white;font-family: verdana;font-size: 20px;"><b>Categories</b></h4>
        <a href="category_redirect.php?type=1"  style="color:white; text-decoration: none;font-family: verdana;">Playstation</a>
        <br> 
        <a href="category_redirect.php?type=2" style="color:white; text-decoration: none;font-family: verdana;">XBOX</a>
        <br> 
        <a href="category_redirect.php?type=3"  style="color:white; text-decoration: none;font-family: verdana;">Consoles</a>
        <br> 
        <a href="category_redirect.php?type=4"  style="color:white; text-decoration: none;font-family: verdana;">Accesories</a> 
        </div>
        <div class="col-2.5"  style="color:white; text-decoration: none;font-family: verdana;">
        <h4 style="color: white;font-family: verdana;font-size: 20px;"><b>About</b></h4>
        <a href="#query"  style="color:white; text-decoration: none;font-family: verdana;">Search</a> 
        <br>
        <a href="cart.php"  style="color:white; text-decoration: none;font-family: verdana;">Shopping Cart</a>
        <br> 
        <a href="SignIn.php"  style="color:white; text-decoration: none;font-family: verdana;">Sign in</a> 
        
        </div>
        <div class="col-1">
            
        </div>

    </footer>
    <center><div class="follow" style="background-color:rgb(32, 41, 58) ;">
        <h4 style="color: white;">follow us</h4> 
        <br>
        <div class="icon"style="margin-left: -5px; margin-top: -20px;"  >
            <i class="fa fa-facebook-f" style="font-size:38px;color:#385898"></i>
            <i class="fa fa-twitter" style="font-size:38px;color:rgb(29, 155, 240)"></i>
            <i class="fa fa-instagram" style="font-size: 38px;color:#fb3958"></i>
            <br>
            <br>
            <br>

        </div>

    </div></center>

    <center><p>@2022 All CopyRights Reserved</p></center>
    <script src="https://kit.fontawesome.com/89f7189b0f.js" crossorigin="anonymous"></script>
    </body>