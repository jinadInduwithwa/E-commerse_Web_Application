<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


include "./Includes/dbh.inc.php";
include "./Admin.NavBar.php";

if($role != 'admin'){
    echo "<script>alert('Please login as Admin');</script>";
    echo "<script>window.open('./User.Loging.php','_self')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <link rel="stylesheet" href="../Style/Admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<!-- Admin dashbord section-->  
    <div class="dashbordContainer">
        <!-- cards -->
        <!-- no of registed user card -->
        <div class="dashbordCard">
            <div class="icon">
                <i class="fa-solid fa-users-line"></i>
            </div>
            <p class="title">Registerd Users</p>
            <?php 

             $quey = "SELECT id FROM users;";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>

        </div>
        <!-- no of Active registed user card -->
        <div class="dashbordCard">
            <div class="icon">
                <i class="fa-solid fa-user-check"></i>
            </div>
            <p class="title">Active Registerd Users</p>
            <?php 

             $quey = "SELECT id FROM users WHERE status=1;";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>

        </div>
        <!-- no of Disacive registed user card -->
        <div class="dashbordCard">
            <div class="icon">
                <i class="fa-solid fa-user-xmark"></i>
            </div>
            <p class="title">Disacive Registerd Users</p>
            <?php 

             $quey = "SELECT id FROM users WHERE status=0;";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>

        </div>
         <!-- No of Contributors card -->
         <div class="dashbordCard">
            <div class="icon">
                <i class="fa-solid fa-truck-field"></i>
            </div>
            <p class="title">Contributors</p>
            <?php 

             $quey = "SELECT id FROM users WHERE role='contributor';";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>
        </div>
         <!-- No of Admins card-->
         <div class="dashbordCard">
            <div class="icon">
                <i class="fa-solid fa-screwdriver-wrench"></i>
            </div>
            <p class="title">No of Admins</p>
            <?php 

             $quey = "SELECT id FROM users WHERE role='admin';";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>
        </div>
        
    </div>
    <div class="dashbordContainer">
        
         <!-- No of Content-->
         <div class="dashbordCard">
            <div class="icon">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <p class="title">Content</p>
            <?php 

             $quey = "SELECT productId FROM Product;";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>
        </div>
        <!-- No of pending Content-->
        <div class="dashbordCard">
            <div class="icon">
                <i class="fa-solid fa-cart-plus"></i>
            </div>
            <p class="title">Pending Content</p>
            <?php 

             $quey = "SELECT productId FROM Product WHERE status='flase';";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>
        </div>
        <!-- No of aproved Content-->
        <div class="dashbordCard">
            <div class="icon">
            <i class="fa-solid fa-cart-arrow-down"></i>
            </div>
            <p class="title">Aproved Content</p>
            <?php 

             $quey = "SELECT productId FROM Product WHERE status='true';";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>
        </div>
         <!-- No of Categories card-->
         <div class="dashbordCard">
            <div class="icon">
                <i class="fa-solid fa-table"></i>
            </div>
            <p class="title">No of Categories</p>
            <?php 

             $quey = "SELECT categoryId FROM Category;";
             $quey_run = mysqli_query($conn, $quey);
             $row = mysqli_num_rows($quey_run);
             echo '<p class="text">'.$row.'</p>'
            ?>
        </div>
        
    </div>
<!-- ---------------------------------------------------- -->    
<!-- Admin pending content section -->  

<div class="adminTitle">
        <p>Pending content</p>
</div> 
    <div class="manageContentContainer">

        <table class="ContentTable">
            <thead>
                <tr>
                    <th>Content Id </th>
                    <th>Content Title</th>
                    <th>Content Discription</th>
                    <th>category ID</th>
                    <th>Content Image 1</th>
                    <th>Content Image 2</th>
                    <th>Content Image 3</th>
                    <th>Content Price</th>
                    <th>date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $selectProduct = "SELECT * FROM Product WHERE status='false';";
                    $selectProductResults = mysqli_query($conn,$selectProduct);
                    while($row = mysqli_fetch_assoc($selectProductResults)){

                        $ProductId = $row['productId'];
                        $productTitle = $row['productTitle'];
                        $productDiscription = $row['productDiscription'];
                        $category_ID = $row['category_ID'];
                        $productImage1 = $row['productImage1'];
                        $productImage2 = $row['productImage2'];
                        $productImage3 = $row['productImage3'];
                        $productPrice = $row['productPrice'];
                        $date = $row['date'];
                        $status = $row['status'];
                        
                ?>

                <tr>
                        <td><?php echo $ProductId ?></td>
                        <td><?php echo $productTitle ?></td>
                        <td><?php echo $productDiscription ?></td>
                        <td><?php echo $category_ID ?></td>
                        <td><?php echo $productImage1 ?></td>
                        <td><?php echo $productImage2 ?></td>
                        <td><?php echo $productImage3 ?></td>
                        <td><?php echo 'Rs.'.$productPrice ?></td>
                        <td><?php echo $date ?></td>
                        <td>
                            <a href='./includes/Admin.Dashbord.AproveContent.php?AproveContent=<?php echo $ProductId ?>'><i class="fa-solid fa-square-check"></i></a>
                            <a href='./includes/Admin.Dashbord.RejectContent.php?RejectContent=<?php echo $ProductId ?>'><i class="fa-solid fa-trash"></i></a>
                        </td>
                 </tr>

                 <?php } ?>

            </tbody>
        </table>
    </div>
    <!-- ---------------------------------------------------- -->  
    
</body>
</html>
