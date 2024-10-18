<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


include "./includes/dbh.inc.php";
include "./Admin.NavBar.php";

if($role != 'admin'){
    echo "<script>alert('Please login as Admin');</script>";
    echo "<script>window.open('./User.Loging.php','_self')</script>";
}


//get url pass data using GET method
if(isset($_GET['faqID'])){
    $faqID=$_GET['faqID'];
    
    $getFaq = "SELECT * FROM FAQ";
    $getFaqResult=mysqli_query($conn,$getFaq);
    $row=mysqli_fetch_assoc($getFaqResult);

    $faqQuestion = $row['faqQuestion'];
    $faqAnswer = $row['faqAnswer'];
}

//get form data using POST method
if(isset($_POST['edit_FAQ'])){
    $question=$_POST['question'];
    $answer=$_POST['answer'];

    $updateFAquery = "UPDATE FAQ SET faqQuestion = '$question', faqAnswer = '$answer' WHERE faqID = $faqID;";
    $updateFAqueryResult = mysqli_query($conn, $updateFAquery);


    if($updateFAqueryResult){
        echo "<script>alert('FAQ updated successfully')</script>";
        echo "<script>window.open('./Admin.FAQ.php','_self')</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit FAQ</title>
    <link rel="stylesheet" href="../Style/Admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!-- Edit Category -->
    <div class="adminTitle">
        <p>Edit category</p>
    </div>

    <div class="EditCategoryContainer">
        <div class="editCategory">
            <div class="title">
            </div>
            
            <form action="" method="POST">

                <label for="">Question</label>
                <input type="text" name="question" value='<?php echo $faqQuestion ?>'> 

                <label for="">Answer</label>
                <input type="text" name="answer" value='<?php echo $faqAnswer ?>' >
        
                <input class="submitBtn" type="submit" name="edit_FAQ" value="Update FAQ">
            </form>

    </div>
</body>
</html>

