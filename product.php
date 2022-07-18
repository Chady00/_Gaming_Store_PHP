<?php 
session_start();


$r=0;
$conn = new mysqli('localhost','root','','store');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
}else {
 
    if(isset($_SESSION['prod_type'])){
        if($_SESSION['prod_type']==1){
            //playstation orders only
            $sql = 'SELECT name,price,brand,sale,count_in_stock,review,img FROM buy WHERE category="playstation"';
            $_SESSION['product']="Playstation"; // will be used as global var here , not just extern then will be set back to 
            //correct index
        }
        else if($_SESSION['prod_type']==2){
            $sql = 'SELECT name,price,brand,sale,count_in_stock,review,img FROM buy WHERE category="Xbox"';
            $_SESSION['product']="XBOX";
        }
        else if($_SESSION['prod_type']==3){
            $sql = 'SELECT name,price,brand,sale,count_in_stock,review,img FROM buy WHERE category="console"';
            $_SESSION['product']="Consoles";
           

        }
        else if($_SESSION['prod_type']==4){
            $sql = 'SELECT name,price,brand,sale,count_in_stock,review,img FROM buy WHERE category="accessories"';
            $_SESSION['product']="Accessories";
         
        }
        else{
            $sql = 'SELECT name,price,brand,sale,count_in_stock,review,img FROM buy';
            $_SESSION['product']="All Products";
            }
    }
   
    $result = mysqli_query($conn,$sql);

    while($row =mysqli_fetch_array($result) )  {
     $buy []=$row;
    } 
        
    mysqli_free_result($result);
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
    
    <div id="header" class="fixed top ">
        <a href="index.php"><img src="imgs/logo_small.png" alt=""  height="50"></a>

        <div>
            <ul id="navbar">
                <li><a  href="index.php">Home</a></li>
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
    

<!-- 
    <section id="banner1" class="section-m1" >
    </section> -->
    <?php if(isset($_SESSION['prod_type'])){
        if($_SESSION['prod_type']==1){
            //playstation orders only
           ?><marquee bgcolor="#69CCFF " style="color:white; font-weight: bold;" loop="-1" scrollamount="5" width="100%">PlayStation Products - Limited Edition: Fifa 2022 ARABIC vesion : Buy or Rent Highend Products -</marquee>
           </div><?php
        }
        else if($_SESSION['prod_type']==2){
            ?><marquee bgcolor="#556260" style="color:white; font-weight: bold;" loop="-1" scrollamount="5" width="100%">XBOX - Xbox gift cards from 100.LE to 2000.LE - Buy or Rent Highend Products - Check Out our New merch - Collaboration coming soon</marquee>
            </div><?php
        }
        else if($_SESSION['prod_type']==3){
            ?><marquee bgcolor="#F9A9ED "style=" color : white;font-weight: bold;" loop="-1" scrollamount="5" width="100%">Consoles - A wide variety of Consoles :PS,Nintendo,Xbox,Software Products -Buy or Rent Highend Products - Check Out our New merch - Collaboration coming soon</marquee>
            </div><?php

        }
        else if($_SESSION['prod_type']==4){
            ?><marquee bgcolor="#F29F85" style=" color : #385898;font-weight: bold;" loop="-1" scrollamount="5" width="100%">Accessories - Check Out New Gaming Gears,Headsets,Chairs Check Out our New merch - Collaboration coming soon</marquee>
            </div><?php
        }
        else{
            ?><marquee bgcolor="#C6ECD9 " style=" color:#232f3f white:; font-weight: bold;" loop="-1" scrollamount="5" width="100%">All Products - Buy or Rent Highend Products - Check Out our New merch - Collaboration coming soon</marquee>
           </div><?php
    }}
    ?>  
        <section id="all-products" class="section-p1">
        <h1><?php if(isset($_SESSION['prod_type'])){ echo $_SESSION['product'];$_SESSION['product']= $_SESSION['prod_type'];}else{echo "All Products";} ?></h1>
        <hr class="solid">
        <!-- <p>Here our new Arrivals</p> -->
        <div class="pro-container" >
        <a href='product_adjust.php?index=0&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;">
             
         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[0][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[0][2].  '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[0][0].  '</span>'; ?></h5>
                    <div class="star">
                        <?php $v =0; $x=5-$buy[0][5]; while($v< $buy[0][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[0][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[0][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php  }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=1&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[1][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[1][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[1][0].  '</span>'; ?></h5>
                        <div class="star">
                        <?php $v =0; $x=5-$buy[1][5]; while($v< $buy[1][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[1][1].  '</span>'; ?></h4>
                    </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[1][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php  }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=2&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[2][6] ?>.jpg" alt="consile1">
                <div class="des">
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[2][2].  '</span>'; ?></span>
                    <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[2][0].  '</span>'; ?></h5>
                    <div class="star">
                    <?php $v =0; $x=5-$buy[2][5]; while($v< $buy[2][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[2][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[2][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=3&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[3][6] ?>.jpg" alt="consile1">
                <div class="des">
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[3][2].  '</span>'; ?></span>
                    <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[3][0].  '</span>'; ?></h5>
                    <div class="star">
                    <?php $v =0; $x=5-$buy[3][5]; while($v< $buy[3][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[3][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[3][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=4&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[4][6] ?>.jpg" alt="consile1">
            <div class="des">
                <span><?php echo '<span style="font-size: 12px;"> ' . $buy[4][2].  '</span>'; ?></span>
                <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[4][0].  '</span>'; ?></h5>
                <div class="star">
                <?php $v =0; $x=5-$buy[4][5]; while($v< $buy[4][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                </div>
                <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[4][1].  '</span>'; ?></h4>
            </div>
            <a href="#"  class="add_to_cart"> <?php if($buy[4][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=5&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[5][6] ?>.jpg" alt="consile1">
                <div class="des">
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[5][2].  '</span>'; ?></span>
                    <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[5][0].  '</span>'; ?></h5>
                    <div class="star">
                    <?php $v =0; $x=5-$buy[5][5]; while($v< $buy[5][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[5][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[5][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=6&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[6][6] ?>.jpg" alt="consile1">
                <div class="des">
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[6][2].  '</span>'; ?></span>
                    <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[6][0].  '</span>'; ?></h5>
                    <div class="star">
                    <?php $v =0; $x=5-$buy[6][5]; while($v< $buy[6][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[6][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[6][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=7&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[7][6] ?>.jpg" alt="consile1">
                <div class="des">
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[7][2].  '</span>'; ?></span>
                    <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[7][0].  '</span>'; ?></h5>
                    <div class="star">
                    <?php $v =0; $x=5-$buy[7][5]; while($v< $buy[7][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[7][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[7][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=8&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[8][6] ?>.jpg" alt="consile1">
                <div class="des">
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[8][2].  '</span>'; ?></span>
                    <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[8][0].  '</span>'; ?></h5>
                    <div class="star">
                    <?php $v =0; $x=5-$buy[8][5]; while($v< $buy[8][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[8][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[8][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
            </div>
            </a>
            <a href='product_adjust.php?index=9&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
            <div class="pro">
            <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[9][6] ?>.jpg" alt="consile1">
                <div class="des">
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[9][2].  '</span>'; ?></span>
                    <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[9][0].  '</span>'; ?></h5>
                    <div class="star">
                    <?php $v =0; $x=5-$buy[9][5]; while($v< $buy[9][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[9][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[9][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
            </div>
            <!-- <a href="CartConnect.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> -->
            </a>
            <a href='product_adjust.php?index=10&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[10][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[10][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[10][0].  '</span>'; ?></h5>
                        <div class="star">
                        <?php $v =0; $x=5-$buy[10][5]; while($v< $buy[10][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[10][1].  '</span>'; ?></h4>
                    </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[10][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=11&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[11][6] ?>.jpg" alt="consile1">
                        <div class="des">
                            <span><?php echo '<span style="font-size: 12px;"> ' . $buy[11][2].  '</span>'; ?></span>
                            <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[11][0].  '</span>'; ?></h5>
                            <div class="star">
                            <?php $v =0; $x=5-$buy[11][5]; while($v< $buy[11][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                            </div>
                            <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[11][1].  '</span>'; ?></h4>
                        </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[11][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=12&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[12][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[12][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[12][0].  '</span>'; ?></h5>
                        <div class="star">
                        <?php $v =0; $x=5-$buy[12][5]; while($v< $buy[12][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[12][1].  '</span>'; ?></h4>
                    </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[12][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=13&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[13][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[13][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[13][0].  '</span>'; ?></h5>
                        <div class="star">
                        <?php $v =0; $x=5-$buy[13][5]; while($v< $buy[13][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[13][1].  '</span>'; ?></h4>
                    </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[13][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=14&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[14][6] ?>.jpg" alt="consile1">
                <div class="des">
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[14][2].  '</span>'; ?></span>
                    <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[14][0].  '</span>'; ?></h5>
                    <div class="star">
                    <?php $v =0; $x=5-$buy[14][5]; while($v< $buy[14][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[14][1].  '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if($buy[14][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=15&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[15][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[15][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[15][0].  '</span>'; ?></h5>
                        <div class="star">
                        <?php $v =0; $x=5-$buy[15][5]; while($v< $buy[15][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[15][1].  '</span>'; ?></h4>
                    </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[15][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=16&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[16][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[16][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[16][0].  '</span>'; ?></h5>
                        <div class="star">
                        <?php $v =0; $x=5-$buy[16][5]; while($v< $buy[16][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[16][1].  '</span>'; ?></h4>
                    </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[16][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=17&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[17][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[17][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[17][0].  '</span>'; ?></h5>
                        <div class="star">
                        <?php $v =0; $x=5-$buy[17][5]; while($v< $buy[17][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[17][1].  '</span>'; ?></h4>
                    </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[17][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=18&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[18][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[18][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[18][0].  '</span>'; ?></h5>
                        <div class="star">
                        <?php $v =0; $x=5-$buy[18][5]; while($v< $buy[18][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[18][1].  '</span>'; ?></h4>
                    </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[18][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php $r=$r+1; }?> </a>
                </div>
                </a>
                <a href='product_adjust.php?index=19&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>' style="text-decoration: none;"> 
                <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[19][6] ?>.jpg" alt="consile1">
                    <div class="des">
                        <span><?php echo '<span style="font-size: 12px;"> ' . $buy[19][2].  '</span>'; ?></span>
                        <h5><?php echo '<span style="font-size: 15px;"> ' . $buy[19][0].  '</span>'; ?></h5>
                        <div class="star">
                         <?php $v =0; $x=5-$buy[19][5]; while($v< $buy[19][5]){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>
                        </div>
                        <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[19][1].  '</span>'; ?></h4>
                    </div>
                    <a href="#"  class="add_to_cart"> <?php if($buy[19][4]) { ?> <i title="available" class="fa-solid fa-check" ></i> <?php } else{ ?><i title="not available - Coming soon" style="margin-left: 14px;" class="fa-solid fa-xmark"></i><?php  }?> </a>
                </div>
                </a>
        </div>



    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>

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
</body>
</html>