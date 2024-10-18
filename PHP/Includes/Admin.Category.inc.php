<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./dbh.inc.php";


if(isset($_POST['insert_category'])){
    $categoryTitle=$_POST['category_title'];
    $categoryDiscription=$_POST['category_discription'];

    $selectQuery =" SELECT * FROM Category WHERE categoryTitle='$categoryTitle';";
    $resultSelect = mysqli_query($conn,$selectQuery);
    $noOfRows = mysqli_num_rows($resultSelect);
    if($noOfRows>0){
        header('Location:../Admin.Category.php?error=item already added');
        exit();
        
    }

    $insertQuery="INSERT INTO Category (categoryTitle,categoryDiscription) VALUES ('$categoryTitle','$categoryDiscription')";
    $resultInsert=mysqli_query($conn,$insertQuery);

    if($resultInsert){
        header('Location:../Admin.Category.php?item succesfully added');
        exit();
        
    }
}