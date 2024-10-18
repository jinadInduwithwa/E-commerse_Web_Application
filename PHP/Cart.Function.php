<?php
include 'includes/dbh.inc.php';

session_start();

if(!isset($_SESSION["userName"])){
    echo "<script>alert('please login');</script>";
    echo "<script>window.open('./User.Loging.php','_self')</script>";
}

$userId = $_SESSION['userid'];
echo $userId;

if(isset($_GET['addedToCart'])){
    $CartProductId=$_GET['addedToCart'];

    $findExistOrNot = "SELECT * FROM BuyProduct WHERE user_id='$userId' AND product_id='$CartProductId'" ;
    $findExistOrNotResult=mysqli_query($conn,$findExistOrNot);

    if (mysqli_num_rows($findExistOrNotResult) > 0) {
            echo "<script>alert('Item Already Added Into Cart');</script>";
            echo "<script>window.open('./Home.Product.php','_self')</script>";
    } else {
            $addBuyProduct = "INSERT INTO BuyProduct(user_id,	product_id) VALUES ('$userId','$CartProductId')" ;
            $addBuyProductResult=mysqli_query($conn,$addBuyProduct);

            if($addBuyProductResult){
                echo "<script>alert('content Add to cart Succesfully');</script>";
                echo "<script>window.open('./Home.Product.php','_self')</script>";
                exit();
            }
        }

    echo $addedToCartUserId;
}