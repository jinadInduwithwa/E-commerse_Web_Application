<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include "./dbh.inc.php";

if(isset($_GET['AproveContent'])){

        $AproveContentId = $_GET['AproveContent'];
        $AproveStatus = 'true';

        $updateStatusQuery = "UPDATE Product SET status='$AproveStatus' WHERE productId = $AproveContentId;";
        $updateStatusQueryResults = mysqli_query($conn,$updateStatusQuery);

        if($updateStatusQueryResults){
            echo "<script>alert('Aprove Content successfully')</script>";
            echo "<script>window.open('../Admin.Dashbord.php','_self')</script>";
        }

}