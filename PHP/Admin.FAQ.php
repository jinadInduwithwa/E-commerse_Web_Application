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
    <title>Admin FAQ</title>
    <link rel="stylesheet" href="../Style/Admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div class="adminTitle">
        <p>FAQ section</p>
</div> 
<div class="faqBtn">
        <a href="./Admin.FAQ.Add.php" >ADD FAQ</a>
</div>
    <div class="manageContentContainer">

    

        <table class="ContentTable">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                    $selectFaq = "SELECT * FROM FAQ;";
                    $selectFaqResults = mysqli_query($conn,$selectFaq);
                    while($row = mysqli_fetch_assoc($selectFaqResults)){

                        $faqID = $row['faqID'];
                        $faqQuestion = $row['faqQuestion'];
                        $faqAnswer = $row['faqAnswer'];
                        
                ?>

                <tr>
                        <td><?php echo $faqQuestion ?></td>
                        <td><?php echo $faqAnswer ?></td>
                        <td><a href='./Admin.FAQ.Edit.php?faqID=<?php echo $faqID ?>'><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href='./Admin.FAQ.Delete.php?faqID=<?php echo $faqID ?>'><i class="fa-solid fa-trash-can"></i></a></td>
                 </tr>

                 <?php } ?>
                 
            </tbody>
        </table>
    </div>
</body>
</html>