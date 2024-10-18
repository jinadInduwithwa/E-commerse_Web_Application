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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!-- Insert Category -->
    <div class="adminTitle">
        <p>Insert new category</p>
    </div>

    <div class="CategoryContainer">
        <div class="insertCategory">
            
            <form action="./includes/Admin.Category.inc.php" method="POST">
                <label for="Category Title">Category Title</label>
                <input type="text" name="category_title" placeholder="insert category">
                <label for="Category Title">Category Discription</label>
                <input type="text" name="category_discription" placeholder="insert category Discription">
        
                <input class="submitBtn" type="submit" name="insert_category" value="Insert Categories">
            </form>

        </div>
    </div>

    <!-- View Category -->
    <div class="adminTitle">
        <p>All category</p>
    </div>

    <div class="ViewCategory">
        <table class="categoryTable">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Title</th>
                    <th>Discription</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            $selectCategories = "SELECT * FROM Category";
            $selectCategoriesResult = mysqli_query($conn,$selectCategories);
            while($row = mysqli_fetch_assoc($selectCategoriesResult)){

                $categoryId = $row['categoryId'];
                $categoryTitle = $row['categoryTitle'];
                $categoryDiscription = $row['categoryDiscription'];
            ?>
                <tr>
                    <td><?php echo $categoryId ?></td>
                    <td><?php echo $categoryTitle ?></td>
                    <td><?php echo $categoryDiscription ?></td>
                    <td><a href='Admin.Category.Edit.php?EditCategory=<?php echo $categoryId ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='./Includes/Admin.Category.Delete.php?DeleteCategory=<?php echo $categoryId ?>'><i class='fa-solid fa-trash-can'></i></a></td>
                </tr>
            
            <?php } ?>

            </tbody>
        </table>
    </div>

</body>
</html>