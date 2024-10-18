<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "./dbh.inc.php";

if(isset($_GET['DeleteCategory'])){
    $deleteCategoryId = $_GET['DeleteCategory'];
    
    $deleteCategoriesQuery = "DELETE FROM Category WHERE categoryId = '$deleteCategoryId';";
    $deleteCategoriesQueryResult = mysqli_query($conn, $deleteCategoriesQuery);
    

        if($deleteCategoriesQueryResult){
            echo "<script>alert('Category deleted successfully')</script>";
            echo "<script>window.open('../Admin.Category.php','_self')</script>";
        }

}



?>