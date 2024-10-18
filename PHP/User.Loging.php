<?php
include "Main.Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Style/User.css">
</head>
<body>

<div class="main_Registration_Loging_Container">
    <div class="Registration_Loging_Container">
        <div class="title">Welcome Back ! <br/> Loging your Grove Haven Account   </div>
        
         <!--login form begin-->
        <form action="./Includes/User.Loging.inc.php" method="post">
            <div class="details">
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" name="uEmail" placeholder="Enter Email" required> 
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="pwd" placeholder="Enter Password" required>
                </div>

            </div>

            <!--buttons-->
            <div class="button">
                <button type="submit" name="submit" class="btn_style">Loging</button>
                
            </div>
            <div class="loging_signup">
                <p>Become a new member ? <a href="./User.Registration.php" id="signIn">Register</a></p>
            </div>
        </form>
        <!--end of login form-->

    </div>
</div>  
<?php
    include "Main.Footer.php";
?>
</body>
</html>
