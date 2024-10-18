<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);


include "./includes/dbh.inc.php";
include "./Admin.NavBar.php";

if($role != 'admin'){
    echo "<script>alert('Please login as Admin');</script>";
    echo "<script>window.open('./User.Loging.php','_self')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Add</title>
    <link rel="stylesheet" href="../Style/Admin.css">
</head>
<body>
    <div class="adminTitle">
        <p>Insert new FAQ</p>
    </div>

    <div class="CategoryContainer">
        <div class="insertCategory">
            
            <form action="./includes/Admin.AddFAQ.inc.php" method="POST">
                <label for="Category Title">Question</label>
                <input type="text" name="Question" placeholder="insert Question">
                <label for="Category Title">Answer</label>
                <input type="text" name="Answer" placeholder="insert Answer">
        
                <input class="submitBtn" type="submit" name="insert_FAQ" value="ADD">
            </form>

        </div>
    </div>
</body>
</html>
