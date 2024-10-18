<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'dbh.inc.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $deleteSql="DELETE FROM users WHERE id='$id'";
    $deleteQuery=mysqli_query($conn,$deleteSql);

    header("location:../Admin.ManageUsers.php");
    
    exit();

}

$selectSql="SELECT * FROM users";
$selectQuery=mysqli_query($conn,$selectSql);
