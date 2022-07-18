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
session_start();
if (isset($_SESSION['user']) and $_SESSION['user'] != "Guest") {
    echo str_repeat('&nbsp;', 3) . "Welcome, " . $_SESSION['user'];
} else {
    ?><a href="SignIn.php" style="text-decoration: none; font-weight: 200;color:#190448  ;"><?php echo str_repeat('&nbsp;', 3) . "Logged in as Guest"; ?></a> <?php
}
?>
                </p>

            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </div>

    <section id="hero">
        <div class="containor">
            <h2>Want to Buy or Rent ?</h2>
            <a href="SignIn.php"> <button>Signin</button></a>

        </div>
    </section>

    <section id="features">

        <h1>Features</h1>
        <p></p>
        <div class="fea-base">
            <div class="fea-box">
                <i class="fa fa-gamepad" aria-hidden="true"></i>
                <h3>All Game related products</h3>
                <p>you will find products of every type and and game</p>
            </div>
            <div class="fea-box">
                <i class="	fab fa-playstation" aria-hidden="true"></i>
                <h3>Buy </h3>
                <p>Buy all your products online and we will deliver it</p>
            </div>
            <div class="fea-box">
                <i class="fab fa-xbox" aria-hidden="true"></i>
                <h3>Rent</h3>
                <p>you can rent any of our products with low price</p>
            </div>

        </div>
    </section>

    <section id="banner1" class="section-m1" >

    </section>

    <section id="most-saled" class="section-p1">
        <h1>New Products</h1>
        <!-- <hr> -->
        <p>Here our new Arrivals</p>
        <?php

$conn = new mysqli('localhost', 'root', '', 'store');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $sql = 'SELECT name,price,brand,sale,count_in_stock,review,img,ID FROM buy WHERE category="playstation"';
    $sql2 = 'SELECT name,price,brand,sale,count_in_stock,review,img,ID From buy WHERE review=4 or review=5';
    $sql3 = 'SELECT name,price,brand,sale,count_in_stock,review,img,ID From buy ';
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql2);
    $result3 = mysqli_query($conn, $sql3);

    while ($row = mysqli_fetch_array($result)) {
        $buy[] = $row;
    }
    while ($row = mysqli_fetch_array($result2)) {
        $buy2[] = $row;
    }
    while ($row = mysqli_fetch_array($result3)) {
        $buy3[] = $row;
    }
    mysqli_free_result($result);
    mysqli_close($conn);
}?>
        <div class="pro-container" >

        <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[0][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[0][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[0][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[0][5];while ($v < $buy[0][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[0][1] . '</span>'; ?></h4>
                </div>
                <?php $r = 0;?>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 1 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[1][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[1][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[1][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[1][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[1][5];while ($v < $buy[1][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[1][1] . '</span>'; ?></h4>
                </div>

                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[2][7] ?>' style="text-decoration: none;">
         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[2][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[2][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[2][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[2][5];while ($v < $buy[2][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[2][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[3][7] ?>' style="text-decoration: none;">
         <div class="pro">
                <img style="min-height: 173px; min-width: 200px;" src="imgs/display/<?php echo $buy[3][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[3][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[3][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[3][5];while ($v < $buy[3][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[3][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[4][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[4][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[4][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[4][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[0][5];while ($v < $buy[4][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[4][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[5][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[5][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[5][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[5][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[5][5];while ($v < $buy[5][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[5][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[6][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[6][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[6][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[6][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[6][5];while ($v < $buy[6][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[6][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[7][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[7][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[7][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[7][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[7][5];while ($v < $buy[7][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[7][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[8][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[8][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[8][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[8][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[8][5];while ($v < $buy[8][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[8][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy[9][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[9][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy[9][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy[9][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy[9][5];while ($v < $buy[9][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy[9][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
<?php $r = 0;?>


    </section>

    <section id="banner2" class="section-m1" >

    </section>

    <section id="most-saled" class="section-p1">
        <h1>Bestseller</h1>
        <!-- <hr> -->
        <p>Here our most saled products for the last month</p>
        <div class="pro-container" >
        <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[0][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[0][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[0][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[0][5];while ($v < $buy2[0][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[0][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[1][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy2[1][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[1][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[1][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[1][5];while ($v < $buy2[1][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[1][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[2][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy2[2][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[2][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[2][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[2][5];while ($v < $buy2[2][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[2][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[3][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 173px; min-width: 200px;" src="imgs/display/<?php echo $buy2[3][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[3][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[3][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[3][5];while ($v < $buy2[3][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[3][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[4][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy2[4][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[4][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[4][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[0][5];while ($v < $buy2[4][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[4][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[5][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy2[5][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[5][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[5][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[5][5];while ($v < $buy2[5][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[5][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[6][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy2[6][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[6][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[6][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[6][5];while ($v < $buy2[6][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[6][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[7][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy2[7][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[7][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[7][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[7][5];while ($v < $buy2[7][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[7][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[8][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy2[8][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[8][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[8][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[8][5];while ($v < $buy2[8][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[8][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy2[9][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy2[9][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy2[9][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy2[9][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy2[9][5];while ($v < $buy2[9][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy2[9][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>
                <?php $r += 1;?>
            </div>
            </a>


            <?php $r = 0;?>
    </section>

    <section id="banner3" class="section-m1" >

    </section>

    <section id="most-saled" class="section-p1">
        <h1>Most Rented</h1>
        <!-- <hr> -->
        <p>Here our most Rented products for the last month</p>
        <div class="pro-container" >
        <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[$r + 1][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r + 1][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r + 1][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r + 1][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r + 1][5];while ($v < $buy3[$r + 1][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r + 1][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[$r][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php $r = rand(0, 19);
echo $buy[$r][6]?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[$r][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
            <a href='product_adjust_sch.php?index=<?php echo 0 ?>&index2=<?php
$r = rand(0, 19);
if (isset($_SESSION['prod_type'])) {
    echo $_SESSION['prod_type'];
} else {echo 0;}
?>&u=<?php echo $buy3[0][7] ?>' style="text-decoration: none;">

         <div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $buy[$r][6] ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $buy3[$r][2] . '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $buy3[$r][0] . '</span>'; ?></h5>
                    <div class="star">
                        <?php $v = 0;
$x = 5 - $buy3[$r][5];while ($v < $buy3[$r][5]) {?>
                        <i class="fa-solid fa-star"></i> <?php $v = $v + 1;}
$v = 0;?>
                        <?php while ($v < $x) {?>
                        <i class="fa-regular fa-star"></i> <?php $v = $v + 1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $buy3[$r][1] . '</span>'; ?></h4>
                </div>
                <a href="#"  class="add_to_cart"> <?php if ($buy[$r][4]) {?> <i title="available" class="fa-solid fa-check" ></i> <?php } else {?><i title="not available - Coming soon" class="fa-solid fa-xmark"></i><?php }?> </a>

            </div>
            </a>
    </section>


    <footer class="section-p1" id="footer" style="background-color: #FB5656; height: 250px;">
        <div class="col-1">
            <img class="logo" src="images/colored_image.jpg" alt="logo of the website" style="width: 100px;height: 50px;">

        </div>
        <div class="col-2.5">
            <h4 style="color: white;" ><b>Contact</b></h4>
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
    <center><div class="follow" style="background-color:white ;">
        <h4 style="color: Black;">follow us</h4>
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