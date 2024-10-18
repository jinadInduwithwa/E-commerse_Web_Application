<?php
include "Main.Header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../Style/User.css">
</head>
<body>
<div class="main_Registration_Loging_Container">
    <div class="Registration_Loging_Container">
        <div class="title">Welcome ! <br/> Create your Grove Haven Account   </div>
        
        <form action="./Includes/User.Register.inc.php" method="post">
            <!--User details-->
            <div class="details">
                
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" name="fName" placeholder="Enter First Name" >
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" name="lName" placeholder="Enter Last Name" >
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="eMail" placeholder="Enter Email" required>
                </div>
                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="text" name="phoneNo" placeholder="Enter Phone Number" >
                </div>
                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" name="pwd" placeholder="Enter Password" >
                </div>
                <div class="input-box">
                    <span class="details">Re-enter Password</span>
                    <input type="password" name="reEnterPwd" placeholder="Re-enter Password" required>
                </div>
            </div>

            <!--address details-->
            <div class="details">
                <div class="input-box">
                    <span class="details">Home Number</span>
                    <input type="text" name="homeNO" placeholder="Enter Home Number" required>
                </div>
                <div class="input-box">
                    <span class="details">Street</span>
                    <input type="text" name="streetName" placeholder="Enter Street Name" required>
                </div>
                <div class="input-box">
                    <span class="details">City</span>
                    <input type="text" name="cityName" placeholder="Enter City Name" required>
                </div>
                <div class="input-box">
                    <span class="details">Country</span>
                    <input type="text" name="countryName" placeholder="Enter Country Name" required>
                </div>
            </div>
            <!--buttons-->
            <div class="button">
                <button type="submit" name="submit" class="btn_style">Register</button>
            </div>
            <div class="loging_signup">
                <p>Already have an account ?  <a href="./User.Loging.php" id="Loging">Loging </a></p>
            </div>
        </form>
    </div>
</div>  
</body>
</html>
<?php
    include "Main.Footer.php";
?>