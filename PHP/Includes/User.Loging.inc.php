<!--we are user for hadling loging form-->
<?php

if(isset($_POST["submit"])){ //if User came to this page by clicking the submit button, if not navigate loging page

    $userEmail = $_POST["uEmail"];
    $pwd = $_POST["pwd"];


    require_once './dbh.inc.php';
    require_once './User.Function.inc.php';

    

    

    if(emptyInputsLogin($userEmail,$pwd)!==false){
        exit();
    }

    LoginUser($conn,$userEmail,$pwd);


}else{
    echo "<script>alert('wrong Login')</script>";
    echo "<script>window.open('../User.Loging.php','_self')</script>";
}
