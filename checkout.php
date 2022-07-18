
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkoutstyle.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="font-awesome-4.7.0/font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"> -->
    <script src="https://kit.fontawesome.com/89f7189b0f.js" crossorigin="anonymous"></script>

    <title>Gamers Patch</title>
</head>
<body>
<div id="header" class="fixed top ">
        
        <a href="index.php"><img src="imgs/logo_small.png" alt=""  height="50"></a>

        <div>
            <ul id="navbar">
                <li><a class="active" href="index.php">Home</a></li>
                <li><a   href="category_redirect.php?type=0" >Products</a></li>
                <li id="cat"><a href="categories.php" >Categories <i class="fa-solid fa-caret-down"></i></a>
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
                
                
                <li><a href="cart.php" title="Shopping Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                <li><a href="SignIn.php" title="login"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                <li><a href="logout.php" title="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                <p style="font-weight: bold; color: #922D4E  ;">
                <?php
                session_start();
                if (isset($_SESSION['user']) and $_SESSION['user']!="Guest" ) {
                echo str_repeat('&nbsp;', 3)."Welcome, " .$_SESSION['user'];
                }
                else{
                ?><a href="SignIn.php" style="text-decoration: none; font-weight: 200;color:#190448  ;"><?php echo str_repeat('&nbsp;', 3)."Logged in as Guest" ; ?></a> <?php
                }
                ?>
                </p>

            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </div>

    <div class="bg-light">
        <div class="container">
            <div  class="py-5 text-center">
                <img src="imgs/logo_checkout.png" class="mb-4 d-block mx-auto" alt="logo" width="200" height="120">
                <h1><b> Checkout</b></h1>
            </div>
        </div>
        <div class="container">
            <h2 class="mb-3">Billing Address</h2>
            <form action="place_order.php" method="POST" novalidate>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="state" class="form-label">state</label>
                        <select id="state"  class="form-control" name="state">
                            <option value="">choose..</option>
                            <option value="Cairo">Cairo</option>
                            <option value="Alexandria">Alexandria</option>
                            <option value="Giza">Giza</option>
                        </select>
                        <div class="invalid-feedback"> valid state is required</div>
                    </div>
                    <br>
                    <div class="col-4">
                        <label for="postcode" class="form-label">postcode</label>
                        <input id="postcode" name="postcode" type="number" class="form-control" placeholder="1234" required>

                        <div class="invalid-feedback"> valid postcode is required</div>
                    </div>
                    <br>
                    <div class="col-8">
                        <label for="address" class="form-label"></label>

                        <div class="input-group input-group-sm mb-3">

                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Address</span>
                            </div>
                            
                            <input id="address" name="address" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                               
                        </div>
                    </div>
                    <br>
                    <div class="solid" style="margin-left: 0px;"></div>
                    <br>
                    
                    <h2 class="mb-3">Payment</h2>
                    <div>
                        <input id="credit card" type="radio" class="form-check-input" name="payment" checked required >
                        <label for="credit card">Cash</label>
                    </div>
                    <div>
                        <input id="Debit card" type="radio" disabled="disabled" class="form-check-input" name="payment" >
                        <label for="Debit card" >Credit Card‏‏ ‎ ‎ <span style="font-size: 10px;">Coming Soon..</span> </label>
                    </div>
                    <div>

                        <input id="PayPal" type="radio" disabled="disabled"   class="form-check-input" name="payment"  >
                        <label for="PayPal">PayPal‏‏ ‎ ‎<span style="font-size: 10px;">     Coming Soon..</span></label>
    
                    </div>
                    <br>
                    <div class="solid" style="margin-left: 0px;"></div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            Name on Card
                            <input type="text" class="form-control" disabled="disabled">
                            <small class="text-muted">
                                Full name as displayed on card
                            </small>
                            <div class="invalid-feedback">
                                Name on Card is Required
                            </div>
                        </div>
                        <div class="col-4">
                            Credit Card number
                            <input type="text" class="form-control" disabled="disabled">
                            
                            <div class="invalid-feedback">
                                Credit Card number is Required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            Expiration
                            <input type="text" class="form-control" disabled="disabled">
                            
                            <div class="invalid-feedback">
                                Expiration is Required
                            </div>
                        </div>
                        <div class="col-3">
                            CVV
                            <input type="text" class="form-control" disabled="disabled">
                            
                            <div class="invalid-feedback">
                        CVV is Required
                            </div>
                        </div>
                    </div>
                    <br>
                   
                    <br>
                    <button class="btn btn-primary btn-lg btn-block col-6" style="margin-left: 300px; ">Place an Order</button>
                    <br>  
            </form>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
        
    <style>
     input:disabled {
     background: #dddddd;
    }

    input:disabled+label {
    color: #ccc;
    }

    input[type=text]+label {
    float: left;
    }
     </style>

        
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
</html>