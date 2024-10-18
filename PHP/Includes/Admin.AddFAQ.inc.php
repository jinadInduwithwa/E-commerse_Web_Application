<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./dbh.inc.php";


if(isset($_POST['insert_FAQ'])){
    $Question=$_POST['Question'];
    $Answer=$_POST['Answer'];


    $insertQuery="INSERT INTO FAQ (faqQuestion,faqAnswer) VALUES ('$Question','$Answer')";
    $resultInsert=mysqli_query($conn,$insertQuery);

    if($resultInsert){
        echo "<script>alert('FAQ Insert Succesful')</script>";
        echo "<script>window.open('../Admin.FAQ.php','_self')</script>";
        exit();
        
    }
}