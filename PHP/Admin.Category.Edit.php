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
    <title>Admin Category</title>
    <link rel="stylesheet" href="../Style/Admin.css">
</head>
<body>

    <?php
    //get url pass data using GET method
    if(isset($_GET['EditCategory'])){
        $EditCategoryId=$_GET['EditCategory'];
        
        $getCategories = "SELECT * FROM Category WHERE categoryId=$EditCategoryId";
        $result=mysqli_query($conn,$getCategories);
        $row=mysqli_fetch_assoc($result);

        $categoryTitle = $row['categoryTitle'];
        $categoryDiscription = $row['categoryDiscription'];
    }
    //get form data using POST method
    if(isset($_POST['edit_category'])){
        $newCategoryTitle=$_POST['categoryTitle'];
        $newCategoryDiscription=$_POST['categoryDiscription'];

        $updateCategoriesQuery = "UPDATE Category SET categoryTitle = '$newCategoryTitle', categoryDiscription = '$newCategoryDiscription' WHERE categoryId = $EditCategoryId;";
        $updateCategoriesQueryResult = mysqli_query($conn, $updateCategoriesQuery);
    

        if($updateCategoriesQueryResult){
            echo "<script>alert('Category updated successfully')</script>";
            echo "<script>window.open('./Admin.Category.php','_self')</script>";
        }

    }

    
    ?>

    <!-- Edit Category -->
    <div class="adminTitle">
        <p>Edit category</p>
    </div>

    <div class="EditCategoryContainer">
        <div class="editCategory">
            <div class="title">
            </div>
            
            <form action="" method="POST">
                <label for="Category Title">Category Title</label>
                <input type="text" name="categoryTitle" value='<?php echo $categoryTitle /* view get id's Title*/?>'> 
                <label for="Category Title">Category Discription</label>
                <input type="text" name="categoryDiscription" value='<?php echo $categoryDiscription /* view get id's discription*/?>' >
        
                <input class="submitBtn" type="submit" name="edit_category" value="Update Category">
            </form>

        </div>
    </div>