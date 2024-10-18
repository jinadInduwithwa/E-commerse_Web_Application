<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "./dbh.inc.php";

if(isset($_GET['usersId'])){
    $deleteUserId = $_GET['usersId'];
    
    $deleteUsersQuery = "DELETE FROM users WHERE id = '$deleteUserId';";
    $deleteUsersQueryResult = mysqli_query($conn, $deleteUsersQuery);
    

        if($deleteUsersQueryResult){
            echo "<script>alert('User Suspended successfully')</script>";
            echo "<script>window.open('../Admin.ManageUsers.php','_self')</script>";
        }

}



?>