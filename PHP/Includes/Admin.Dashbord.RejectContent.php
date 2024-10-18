<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include "./dbh.inc.php";

if(isset($_GET['RejectContent'])){

        $RejectContentId = $_GET['RejectContent'];

        $rejectContentQuery = "DELETE FROM Product WHERE productId='$RejectContentId '";
        $rejectContentQueryResults = mysqli_query($conn,$rejectContentQuery);

        if($rejectContentQueryResults){
            echo "<script>alert('Content Rejected Successfully')</script>";
            echo "<script>window.open('../Admin.Dashbord.php','_self')</script>";
        }

}