<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include "./dbh.inc.php";

if(isset($_GET['usersId'])){

        $userId = $_GET['usersId'];
        $AproveStatus = 1;

        $updateStatusQuery = "UPDATE users SET status='$AproveStatus' WHERE id = $userId;";
        $updateStatusQueryResults = mysqli_query($conn,$updateStatusQuery);

        if($updateStatusQueryResults){
            echo "<script>alert('Active User successfully')</script>";
            echo "<script>window.open('../Admin.ManageUsers.php','_self')</script>";
        }

}