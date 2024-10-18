<?php
//----------------------- register page functions ------------------------------------------
function emptyInputSignUp($firstName, $lastName, $Email, $phoneNumber, $password, $reEnterPassword, $homeNumber, $streetName, $cityName, $countryName){ 
    $result;
    if(empty($firstName) ||empty($lastName) ||empty($Email) ||empty($phoneNumber) ||empty($password) ||empty($reEnterPassword) ||empty($homeNumber) ||empty($streetName) ||empty($cityName) ||empty($countryName) ){
        $result = true;  
    }else{
        $result = false; 
    }
    return $result;
}

function invalidEmail($Email){
    $result;
    if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
        $result = true;  
    }else{
        $result = false; 
    }
    return $result;
}

function pwdMatch($password, $reEnterPassword){
    $result;
    if($password !== $reEnterPassword){
        $result = true;  
    }else{
        $result = false; 
    }
    return $result;
}

function emailExists($conn, $Email){
    $sql = "SELECT *  FROM users WHERE usersEmail = ? ;"; // ? - bind parameters for security purpose

    $stmt = mysqli_stmt_init($conn); //connection check
    if(!mysqli_stmt_prepare($stmt,$sql)){ // if the connection faield, exit
        header("Location:../Registration.php?error=stamtfaild");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $Email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData )){
        return $row;
    }else{
        return false;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $firstName, $lastName, $Email, $phoneNumber, $password, $homeNumber, $streetName, $cityName, $countryName){
    $sql = "INSERT INTO users (usersFirstName, usersLastName, usersEmail, usersPhoneNumber, usersPassword, usersHomeNumber, usersStreet, usersCity, usersCountry) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn); //connection check
    if(!mysqli_stmt_prepare($stmt,$sql)){ // if the connection faield, exit
        echo "<script>alert('Connection Lost')</script>";
        echo "<script>window.open('../User.Registration.php','_self')</script>";
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // encript password

    mysqli_stmt_bind_param($stmt, "sssssssss", $firstName, $lastName, $Email, $phoneNumber, $hashedPassword, $homeNumber, $streetName, $cityName, $countryName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    echo "<script>alert('Succesfully Registerd')</script>";
    echo "<script>window.open('../User.Registration.php','_self')</script>";
    exit();
}
//---------------------------------------------------------------------------------------------------------
//----------------------- Loging page functions -----------------------------------------------------------
function emptyInputsLogin($userEmail,$pwd){ 
    $result;
    if(empty($userEmail) || empty($pwd)){
        $result = true;  
    }else{
        $result = false; 
    }
    return $result;
}


function LoginUser($conn, $userEmail, $pwd) {
    $usersEmailExists = emailExists($conn, $userEmail);

    if ($usersEmailExists === false) {
        echo "<script>alert('Check email or password')</script>";
        echo "<script>window.open('../User.Loging.php','_self')</script>";
        exit();
    }

    $pwdHashed = $usersEmailExists["usersPassword"];
    $checkPassword = password_verify($pwd, $pwdHashed);

    if ($checkPassword === false) {
        echo "<script>alert('Password Dismatched')</script>";
        echo "<script>window.open('../User.Loging.php','_self')</script>";
        exit();
    } elseif ($checkPassword === true) {
        session_start();
        $_SESSION["userid"] = $usersEmailExists["id"];
        $_SESSION["userEmail"] = $usersEmailExists["usersEmail"];
        $_SESSION["userName"] = $usersEmailExists["usersFirstName"];
        $_SESSION["role"] = $usersEmailExists["role"];
        $_SESSION["status"] = $usersEmailExists["status"]; 

        if ($_SESSION["status"] == 0) {
            // User is inactive
            echo "<script>alert('Your account is inactive. Please contact support.')</script>";
            session_destroy();
            echo "<script>window.open('./User.Loging.inc.php','_self')</script>";
            
        } else {
            if ($_SESSION["role"] == 'user') {
                header("Location: ../Home.Main.php");
            } elseif ($_SESSION["role"] == 'admin') {
                header("Location: ../Admin.Dashbord.php");
            } elseif ($_SESSION["role"] == 'contributor') {
                header("Location: ../Contributor.ViewProduct.php");
            } else {
                echo "<script>alert('Invalid Login Role')</script>";
                echo "<script>window.open('../User.Registration.php','_self')</script>";
            }
        }
    } else {
        echo "<script>alert('You can't login')</script>";
        echo "<script>window.open('../User.Registration.php','_self')</script>";
    }
}