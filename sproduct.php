<?php 
session_start();

$catg=$_GET['catg'];
$_SESSION['chosen']=$catg;

///receive the actual value
$conn = new mysqli('localhost','root','','store');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}else {
    //all products
    if($catg==0){
    $sql2 =  'SELECT name,price,brand,sale,Description,dimensions,color,count_in_stock,ID,Item_package_weight,img  FROM buy ';
    }
    else if($catg==1){
        // playstation
        $sql2 =  'SELECT name,price,brand,sale,Description,dimensions,color,count_in_stock,ID,Item_package_weight,img FROM buy WHERE category="playstation"';
        
    }
    else if($catg==2){
        $sql2 =  'SELECT name,price,brand,sale,Description,dimensions,color,count_in_stock,ID,Item_package_weight,img  FROM buy WHERE category="Xbox"';
        
    }
    else if($catg==3){
        $sql2 =  'SELECT name,price,brand,sale,Description,dimensions,color,count_in_stock,ID,Item_package_weight,img  FROM buy WHERE category="console"';
       
    }
    else if($catg==4){
        $sql2 =  'SELECT name,price,brand,sale,Description,dimensions,color,count_in_stock,ID,Item_package_weight,img  FROM buy WHERE category="accessories"';
        
    }



    $sql = 'SELECT userID,userName ,email FROM signup';
    $result= mysqli_query($conn,$sql);
    $result2=mysqli_query($conn,$sql2);
    while($row =mysqli_fetch_array($result) )  {
        $customer []=$row;
       }

    //fetch the resulting rows
    while($row =mysqli_fetch_array($result2) )  {
     $buy []=$row;
    } 
    

    $_SESSION['customers']=$customer;
    $_SESSION['chosen_products']=$buy;
    mysqli_free_result($result);
    mysqli_free_result($result2);
    mysqli_close($conn);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

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
                <li><a href="index.php">Home</a></li>
                <li><a class="active"  href="category_redirect.php?type=0" >Products</a></li>
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
                <li>               
                    <form action="search.php" role="search" method="post" id="form">
                    <input type="text" id="query" name="q" placeholder="Search..." aria-label="Search through site content">
                    <button>
                    <svg viewBox="0 0 1024 1024"><path class="path1" d="M848.471 928l-263.059-263.059c-48.941 36.706-110.118 55.059-177.412 55.059-171.294 0-312-140.706-312-312s140.706-312 312-312c171.294 0 312 140.706 312 312 0 67.294-24.471 128.471-55.059 177.412l263.059 263.059-79.529 79.529zM189.623 408.078c0 121.364 97.091 218.455 218.455 218.455s218.455-97.091 218.455-218.455c0-121.364-103.159-218.455-218.455-218.455-121.364 0-218.455 97.091-218.455 218.455z"></path></svg>
                    </button>
                </form></li>

                <li><a href="cart.php" title="Shopping Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                <li><a href="SignIn.php" title="login"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                <li><a href="logout.php" title="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
                <p style="font-weight: bold; color: #922D4E  ;">
                <?php
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
     

    <section id="pdetails"  class="section-p1">
        <div class="single-pro-image">
            <img src="imgs/display/<?php echo $buy[$_SESSION['product']][10] ?>.jpg" width="100%" id="MainImg"  alt="">
    
            <?php if($catg==3 or $catg==4){ ?>
            <div class="small-img-group">
                <div class="small-img-col">
                    <img class="smallimg"  src="imgs/display/<?php echo $buy[$_SESSION['product']][10] ?>_1.jpg" width="100%"  alt=""  >
                </div>
                <div class="small-img-col">
                    <img  class="smallimg" src="imgs/display/<?php echo $buy[$_SESSION['product']][10] ?>_2.jpg" width="100%"  alt="">
                </div>
                <div class="small-img-col">
                    <img src="imgs/display/<?php echo $buy[$_SESSION['product']][10] ?>_3.jpg" width="100%" class="smallimg"  alt="">
                </div>
                <div class="small-img-col">
                    <img src="imgs/display/<?php echo $buy[$_SESSION['product']][10] ?>_4.jpg" width="100%" class="smallimg"  alt="">
                </div>
            </div> <?php } ?>
        </div>

        <div class="single-pro-detail">
                <h6><?php echo '<span > ' . $buy[$_SESSION['product']][2].  '</span>'; ?></h6> 
                <h4> <?php echo '<span > ' . $buy[$_SESSION['product']][0].  '</span>'; ?></h4>
                <h2 style="color:#922D4E;"><?php echo '<span >'. $buy[$_SESSION['product']][1].' </span>';?><p style="color:red; display: inline;">LE</p></h2>
              
                <form id="cart2"  action="CartConnect.php" method="post">
                <div style="margin-top: 10px;">
                <select style="margin-right: 20px;" name="a" id="a">
                    <option value="" >Buy or Rent ?</option>
                    <option value="0" >Buy</option> 
                    <option value="1">Rent</option>
                </select>
                </div>
                <input id="input" type="number" value="1" min="1" name="input_count">
                <input  type="submit" id="cart3" value="Add to Cart">
                <?php if(isset($_SESSION['added'])){
                    if($_SESSION['added']==1){$_SESSION['added']=0; ?> 
                        <div id= "fadeout" style="margin-left: 65px; margin-top: -1px; " >
                        <img style="max-width: 500px;max-width: 200px;" src="imgs/added_to_cart_2.gif" alt="this slowpoke moves"  width="450" />
                        </div>
                        <style>
                            #fadeout {
                            font-family: sans-serif;
                            width: 110px;
                            opacity: 1;
                            margin-top: 12px;
                            margin-left: 30px;
                            color:red;
                            transition: 1s opacity;
                            text-align: center;
                            font-size:16px;}
                        </style>
                        <script>
                            window.onload = function() {
                            window.setTimeout(fadeout, 5000); //8 seconds
                        }

                function fadeout() {
                  document.getElementById('fadeout').style.opacity = '0';
                }
                </script> <?php }}
                ?>
                </form>
                
                <b><h3>Product Details:</h3></b>
                <span><?php echo $buy[$_SESSION['product']][2]; ?> Computer entertaiment CFI-ZCT1W <?php echo $buy[$_SESSION['product']][0]; ?>  <br>
                
                <b>Product Description</b>  ‏ : ‎  <?php echo $buy[$_SESSION['product']][4]; ?>
                <br><b>Product Dimensions</b> ‏ : ‎ <?php echo $buy[$_SESSION['product']][5]; ?> <br>
                <b>Count in Stock</b> ‏ : ‎ <?php echo $buy[$_SESSION['product']][7]; ?> ‎  pieces left <br>  
                <b>Item Package Weight</b> ‏ : ‎ <?php echo $buy[$_SESSION['product']][9]; ?>‎ gm <br><br>
               <b><span>Rate Product:</b>
                </span>
                <br>
<form class="rating">
  <label>
    <input type="radio" name="stars" value="1" />
    <span class="icon"><i class="fa-solid fa-star"></i></span>
  </label>
  <label>
    <input type="radio" name="stars" value="2" />
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
  </label>
  <label>
    <input type="radio" name="stars" value="3" />
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
  </label>
  <label>
    <input type="radio" name="stars" value="4" />
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
  </label>
  <label>
    <input type="radio" name="stars" value="5" />
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
    <span class="icon"><i class="fa-solid fa-star"></i></span>
  </label>
</form>
<style>
    .rating {
  display: inline-block;
  position: relative;
  height: 50px;
  line-height: 50px;
  font-size: 30px;
}

.rating label {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  cursor: pointer;
}

.rating label:last-child {
  position: static;
}

.rating label:nth-child(1) {
  z-index: 5;
}

.rating label:nth-child(2) {
  z-index: 4;
}

.rating label:nth-child(3) {
  z-index: 3;
  
}

.rating label:nth-child(4) {
  z-index: 2;
}

.rating label:nth-child(5) {
  z-index: 1;
}

.rating label input {
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  
}

.rating label .icon {
  float: left;
  color: transparent;

}



.rating label:last-child .icon {
  color: grey;
}

.rating:not(:hover) label input:checked ~ .icon,
.rating:hover label:hover input ~ .icon {
  color: yellow;
}

.rating label input:focus:not(:checked) ~ .icon:last-child {
  color: #000;
  text-shadow: 0 0 5px #09f;
}
</style>

        </div>
    </section>
    




    <section id="most-saled" class="section-p1">
        <h1>Related Products</h1>
        <!-- <hr> -->
        <!-- <p>Here our most saled products for the last month</p> -->
        <div class="pro-container" >
        <?php  $t=rand(0,19)?>
        <a href='category_redirect.php?type=<?php echo $catg; ?>' style="text-decoration: none;">
            <div class="pro">
                <img src="imgs/display/<?php  echo $buy[$t][10]?>.jpg"  alt="consile1">
                <div class="des">
                    <span>sony</span>
                    <h5><?php echo  $buy[$t][0] ; ?></h5>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h4>$<?php  echo " ".$buy[$t][1]?></h4>
                </div>
                <a href="#" class="add_to_cart"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <a href='category_redirect.php?type=<?php echo $catg; ?>' style="text-decoration: none;">
            <div class="pro">
            <img src="imgs/display/<?php  $t=rand(0,19); echo  $buy[$t][10]?>.jpg" alt="consile1">
                    <div class="des">
                        <span>sony</span>
                        <h5><?php echo  $buy[$t][0] ; ?></h5>
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h4>$<?php  echo " ".$buy[$t][1]?></h4>
                    </div>
                <a href="#" class="add_to_cart"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <a href='category_redirect.php?type=<?php echo $catg; ?>' style="text-decoration: none;">
            <div class="pro">
            <img src="imgs/display/<?php  $t=rand(0,19); echo  $buy[$t][10]?>.jpg" alt="consile1">
                <div class="des">
                    <span>sony</span>
                    <h5><?php echo  $buy[$t][0] ; ?></h5>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h4>$<?php  echo " ".$buy[$t][1]?></h4>
                </div>
                <a href="#" class="add_to_cart"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <a href='category_redirect.php?type=<?php echo $catg; ?>' style="text-decoration: none;">
            <div class="pro">
            <img src="imgs/display/<?php  $t=rand(0,19); echo  $buy[$t][10]?>.jpg" alt="consile1">
                <div class="des">
                    <span>sony</span>
                    <h5><?php echo  $buy[$t][0] ; ?></h5>
                    <div class="star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h4>$<?php  echo " ".$buy[$t][1]?></h4>
                </div>
                <a href="#" class="add_to_cart"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            <a href='category_redirect.php?type=<?php echo $catg; ?>' style="text-decoration: none;">
            <div class="pro">
            <img src="imgs/display/<?php  $t=rand(0,19); echo  $buy[$t][10]?>.jpg" alt="consile1">
            <div class="des">
                <span>sony</span>
                <h5><?php echo  $buy[$t][0] ; ?></h5>
                <div class="star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <h4>$<?php  echo " ".$buy[$t][1]?></h4>
            </div>
            <a href="#" class="add_to_cart"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            
        </div>



    </section>


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
    <script>
        var MainImg = document.getElementById("MainImg");
        var smallimg = document.getElementsByClassName("smallimg");
        var temp;
        smallimg[0].onclick = function () {
            temp = MainImg.src ;
            MainImg.src = smallimg[0].src ;
            smallimg[0].src = temp;
        }
        smallimg[1].onclick = function(){
            temp = MainImg.src ;
            MainImg.src = smallimg[1].src ;
            smallimg[1].src = temp;
        }
        smallimg[2].onclick = function(){
            temp = MainImg.src ;
            MainImg.src = smallimg[2].src ;
            smallimg[2].src = temp;
        }
        smallimg[3].onclick = function(){
            temp = MainImg.src ;
            MainImg.src = smallimg[3].src ;
            smallimg[3].src = temp;
        }
    </script>
    <script src=""></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
</body>
</html>