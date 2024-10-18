<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./includes/dbh.inc.php";
 
session_start();
if (!isset($_SESSION['userid'])) {
    echo "<script>alert('Please log in');</script>";
    echo "<script>window.open('./User.Loging.php','_self')</script>";
    exit();
}

if(isset($_GET['productId'])){
    $deleteId=$_GET['productId'];

    $deleteProductQuery = "DELETE FROM BuyProduct WHERE product_id=$deleteId";
    $deleteProductQueryResult = mysqli_query($conn,$deleteProductQuery);

    if($deleteProductQueryResult){
        echo "<script>alert('Content Deleted Succesfully');</script>";
        echo "<script>window.open('./Cart.View..php','_self')</script>";
    }
}