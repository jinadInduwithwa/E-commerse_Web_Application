 <?php
 
    include "./includes/dbh.inc.php";
    session_start();

 ?>
 
 <!-- Header -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../Style/header.css">
         <header>
                <nav class="navigationBar">
                    <div class="logoIntro">
                        <a href="./Home.Main.php"><img class="logo"src="../assert/logo.png" alt="logo"></a>
                        <div>
                            <div class="StoreName"><a href="./Home.Main.php">Grove Haven</a></div>
                            <div class="storeMoto">All at Your Fingertips</div>
                        </div> 
                    </div>

                    <ul class="listItem">
                        <li><a href="./Home.Main.php">Home</a></li>
                        <li><a href="./Home.FAQ.php">FAQ</a></li>
                        <li><a href="./Home.AboutUs.php">About Us</a></li>
                        <li><a href="./Home.Product.php">Browse</a></li>
                    </ul>
                    <div class="navButtons">

                        <?php 
                            if(isset($_SESSION["userName"])){
                                echo '<a class="navigater" href="./Cart.View..php">.<i class="fa-solid fa-cart-shopping"></i>.</a>';
                                echo 'Hello,'.'<a class="navigater" href="">'.$_SESSION["userName"].'</a>';
                                echo '<a href="./Includes/User.Logout.inc.php" class="Loging navigater">'.'Logout'.'</a>';
                            } else {
                                echo '<p> Welcome ! </p>'.'<a href="./User.Loging.php" class="Loging navigater">Login</a> | <a href="./User.Registration.php" class="Register navigater">Register</a>';
                            }
                        ?> 
                       
                    </div>
                </nav>
            </header>