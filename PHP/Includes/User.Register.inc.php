<!--we are user for hadling loging form-->
<?php

if(isset($_POST["submit"])){ //if User came to this page by clicking the submit button, if not navigate loging page

    $firstName = $_POST["fName"];
    $lastName = $_POST["lName"];
    $Email = $_POST["eMail"];
    $phoneNumber = $_POST["phoneNo"];
    $password = $_POST["pwd"];
    $reEnterPassword = $_POST["reEnterPwd"];
    $homeNumber = $_POST["homeNO"];
    $streetName = $_POST["streetName"];
    $cityName = $_POST["cityName"];
    $countryName = $_POST["countryName"];

    require_once './dbh.inc.php';
    require_once './User.Function.inc.php';

    $emptyInput = emptyInputSignUp($firstName, $lastName, $Email, $phoneNumber, $password, $reEnterPassword, $homeNumber, $streetName, $cityName, $countryName);
    $invalidEmail = invalidEmail($Email);
    $pwdMatch = pwdMatch($password, $reEnterPassword);
    $emailExists = emailExists($conn, $Email);

    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=]).{8,}$/";
    if (!preg_match($pattern, $password)) {
        echo "<script>alert('Password must contain at least one uppercase letter, one lowercase letter, one digit, one special character, and be at least 8 characters long')</script>";
        echo "<script>window.open('../User.Registration.php','_self')</script>";
        exit();
    }

    if($emptyInput !== false){
        echo "<script>alert('Empty User Input')</script>";
        echo "<script>window.open('../User.Registration.php','_self')</script>";
        exit();
    }
    if($invalidEmail !== false){
        echo "<script>alert('Invalid Email')</script>";
        echo "<script>window.open('../User.Registration.php','_self')</script>";
        exit();
    }
    if($pwdMatch !== false){
        echo "<script>alert('Password Not Matched')</script>";
        echo "<script>window.open('../User.Registration.php','_self')</script>";
        exit();
    }
    if($emailExists !== false){
        echo "<script>alert('Email Exsist')</script>";
        echo "<script>window.open('../User.Registration.php','_self')</script>";
        exit();
    }

    createUser($conn, $firstName, $lastName, $Email, $phoneNumber, $password, $homeNumber, $streetName, $cityName, $countryName);

}else{

    header('Location:../loging.php');//navigate loging page
    
}
