<html>
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
    </body>



</html>

<?php 


$con = new PDO("mysql:host=localhost;dbname=store",'root','');

if (isset($_POST["q"])) {
	$text =$_POST['q'];
	$sth = $con->prepare("SELECT name,price,brand,img,category,ID FROM `buy` WHERE name LIKE '%$text%'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();
?>

    <section id="all-products" class="section-p1">
    <h3 class="animate-charcter" style="font-size: 25px ;font-family:  'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Here Is What We Found For You:</h3>
    <hr class="solid"><br><br><br>
    <div class="pro-container" >
    
<?php
    $i=0;
    $flag = 0;
	while($row = $sth->fetch())
	{   //setting the needed variables to send 
        $r=$row->category;
        $flag=1;
        if($r=="playstation"){$_SESSION['prod_type']=1;}
        else if($r=="Xbox"){$_SESSION['prod_type']=2;}
        else if($r=="console"){$_SESSION['prod_type']=3;}
        else if($r=="accessories"){$_SESSION['prod_type']=4;}
        else {$_SESSION['prod_type']=0;}
		?>
   <a href='product_adjust_sch.php?index=<?php echo $i?>&index2=<?php
         if(isset($_SESSION['prod_type']))echo $_SESSION['prod_type'];
         else{ echo 0;}
         ?>&u=<?php echo $row->ID ?>' style="text-decoration: none;">
		<div class="pro">
                <img style="min-height: 170px; min-width: 200px;" src="imgs/display/<?php echo $row->img ?>.jpg" alt="consile1">
                <div class="des" >
                    <span><?php echo '<span style="font-size: 12px;"> ' . $row->brand.  '</span>'; ?></span>
                    <h5> <?php echo '<span style="font-size: 15px;"> ' . $row->name.  '</span>'; ?></h5>
                    <div class="star">
                        <?php $v =0; $x=5-3; while($v< 3){ ?>
                        <i class="fa-solid fa-star"></i> <?php $v=$v+1;} $v=0;?>
                        <?php while($v< $x){ ?>
                        <i class="fa-regular fa-star"></i> <?php $v=$v+1;}?>

                    </div>
                    <h4>$<?php echo '<span style="font-size: 14px;"> ' . $row->price.  '</span>'; ?></h4>
                </div>
                <a href="CartConnect.php" class="add_to_cart"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
            </a>
            
<?php
$i+=1;
	} ?>

    </div>
    </section>		
<?php
     if($flag==0){

         ?>
 
         <img style="width: 500px; margin-left: 500px; margin-top: -130px;" src="imgs/nothing_found.jpg" alt="We couldn't find what you were looking for.."><?php
     }
}



?>