<?php
include "./Includes/dbh.inc.php";

if(isset($_GET['DeleteProduct'])){
    $deleteId=$_GET['DeleteProduct'];

    $deleteProductQuery = "DELETE FROM Product WHERE productId=$deleteId";
    $deleteProductQueryResult = mysqli_query($conn,$deleteProductQuery);

    if($deleteProductQueryResult){
        echo "<script>alert('Content Deleted Succesfully');</script>";
        echo "<script>window.open('./Contributor.ViewProduct.php','_self')</script>";
    }
}