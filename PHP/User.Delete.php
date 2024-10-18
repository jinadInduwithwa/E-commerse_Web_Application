<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "./includes/dbh.inc.php";
if(isset($_GET['userId'])){
    $userId = $_GET['userId'];
    echo $userId ;


        $deleteFAQQuery = "DELETE FROM users WHERE id = '$userId';";
        $deleteFAQQueryResult = mysqli_query($conn, $deleteFAQQuery);
        
    
            if($deleteFAQQueryResult){
                echo "<script>alert('Delete Complete')</script>";
                echo "<script>window.open('./User.Delete.php','_self')</script>";
            }
}

?>
