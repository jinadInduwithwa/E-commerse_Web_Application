<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include "./includes/dbh.inc.php";
include "./Admin.NavBar.php";

if($role != 'admin'){
    echo "<script>alert('Please login as Admin');</script>";
    echo "<script>window.open('./User.Loging.php','_self')</script>";
}



if(isset($_GET['faqID'])){

        $faqID = $_GET['faqID'];

        $deleteFAQQuery = "DELETE FROM FAQ WHERE faqID = '$faqID';";
        $deleteFAQQueryResult = mysqli_query($conn, $deleteFAQQuery);
        
    
            if($deleteFAQQueryResult){
                echo "<script>alert('Delete FAQ successfully')</script>";
                echo "<script>window.open('./Admin.FAQ.php','_self')</script>";
            }

}