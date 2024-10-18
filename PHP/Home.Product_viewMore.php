<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
    include "./Includes/dbh.inc.php"; 
    include "./Includes/Home.Function.php"; 
    include "Main.Header.php";
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View More</title>
    <link rel="stylesheet" href="../Style/Home.product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
<div class="productDetailContainer">
    <?php
        if(isset($_GET['productId'])){
            $productID=$_GET['productId'];
            $selectQuery = "SELECT *  FROM Product WHERE productId=$productID";
            $resultQuery=mysqli_query($conn,$selectQuery);

            while($row=mysqli_fetch_assoc($resultQuery)){
                $productTitle = $row['productTitle'];
                $productDiscription = $row['productDiscription'];
                $productPrice = $row['productPrice'];
                $productImage1 = $row['productImage1'];
                $productImage2 = $row['productImage2'];
                $productImage3 = $row['productImage3'];

                echo "<div class='productDetailContainer_left'>
                <img style='max-width:200px' src='./ProductImage/$productImage1'alt='$productTitle' class='productImg'>
                <img style='max-width:200px' src='./ProductImage/$productImage2' alt='$productTitle' class='productImg'>
                <img style='max-width:200px' src='./ProductImage/$productImage3' alt='$productTitle' class='productImg'>
        
            </div>
            <div class='productDetailContainer_right'>
                
                <h1>$productTitle</h1>
                <p>$productDiscription</p>
                <p class='price'>Rs : $productPrice</p>
                <div class='btnCart'>
                    <a href='Cart.Function.php?addedToCart=$productID' >ADD CART</a>
                </div>
        
            </div>";
            }

    
        }
    ?>
    
</div>

<div class="randomProductContainer">
    <h1>More Products</h1>

    <div class="galary">
        <?php
        getRandomProducts();
        ?>
    </div>
    
</div>

</body>

