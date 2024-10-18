<?php
$serverName="localhost";
$dbUserName="root";
$dbPassword="";
$dbName="Grove";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

//error handling of db connection
if(!$conn){
    die("database connection faild : " .mysqli_connect_error());
}