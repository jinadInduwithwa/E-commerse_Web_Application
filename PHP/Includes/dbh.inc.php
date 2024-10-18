<?php
$serverName="localhost";
$dbUserName="Grove";
$dbPassword="1234";
$dbName="Grove";

$conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);

//error handling of db connection
if(!$conn){
    die("database connection faild : " .mysqli_connect_error());
}