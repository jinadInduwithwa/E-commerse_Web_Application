
<?php
include "./includes/dbh.inc.php";
session_start();
$role = $_SESSION['role'];


?>

<!-- Header -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../Style/Admin.css">
     <header>
            <nav class="navigationBar">
                <div class="logoIntro">
                    <a href="#"><img class="logo"src="../assert/logo_stakeholder.png" alt="logo"></a>
                    <div>
                        <div class="StoreName"><a href="#">Grove Haven</a></div>
                        <div class="storeMoto">All at Your Fingertips</div>
                    </div> 
                </div>

                <ul class="listItem">
                <?php
                        if($role == 'admin'){

                            echo 
                            '<li><a href="./Admin.Dashbord.php">Dashboard</a></li>
                            <li><a href="./Admin.ManageUsers.php">Users</a></li>
                            <li><a href="./Admin.CreateContributor.php">Contributors</a></li>
                            <li><a href="./Admin.Category.php">Category</a></li>
                            <li><a href="./Admin.FAQ.php">FAQ</a></li>';
                            

                        }else if($role == 'contributor'){

                            echo 
                            '<li><a href="./Contributor.InsertProduct.php">Insert Product</a></li>
                            <li><a href="./Contributor.ViewProduct.php">View Product</a></li>';
                        }
                ?>
                    
                    
                </ul>

                

                <div class="navButtons">
                    <?php
                        if($role == 'admin'){
                            echo '<a class="navigater" href="#">'.$_SESSION['userName'].'</a>
                            <a href="./Includes/User.Logout.inc.php" class="Loging navigater">Log Out</a>';
                            
                        }else if($role == 'contributor'){

                            echo '<a class="navigater" href="#">'.$_SESSION['userName'].'</a>
                            <a href="./Includes/User.Logout.inc.php" class="Loging navigater">Log Out</a>';
                        }
                    ?>
                    
                </div>
            </nav>
        </header>