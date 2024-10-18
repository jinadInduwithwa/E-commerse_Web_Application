<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include "./Admin.NavBar.php";
    include "./Includes/dbh.inc.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Contributor.css">
    <title>INSERT PRODUCT</title>
</head>
<body>
    <div class="ProductContainer">
        <div class="InsertProduct">
            <div class="title">
                <label for="Category Title">Add new Product</label>
            </div>
            
            <form action="" method="POST" enctype="multipart/form-data">


                <label for="Product Title">Product Title</label>
                <input type="text" name="productTitle" autocomplete="off" required="required" placeholder="Insert Product">

                <label for="">Product Discription</label>
                <input type="text" name="description" placeholder="Insert Product Discription">

                <label for="">Product Keyword</label>
                <input type="text" name="keyword" placeholder="Insert Product Keywords">

                <label for="Category Title">Select Product Category</label>
                <select name="productCategories">
                    <?php 
                        $selectQuery="SELECT * FROM Category";
                        $resultSelectQuery=mysqli_query($conn,$selectQuery);

                        while($row=mysqli_fetch_assoc($resultSelectQuery)){
                        $categoryId=$row['categoryId'];
                        $categoryTitle=$row['categoryTitle'];

                        echo "<option value='$categoryId'>$categoryTitle</option>";
                    }
                     ?>
                </select>

                <label for="">Insert Image 1 </label>
                <input type="file" name="image1" >

                <label for="">Insert Image 2 </label>
                <input type="file" name="image2">

                <label for="">Insert Image 3 </label>
                <input type="file" name="image3">

                <label for="">Product Price </label>
                <input type="text" name="price">
        
                <input class="submitBtn" type="submit" name="insertProduct" value="Insert Product">
            </form>

        </div>
    </div>

    <?php
    if (isset($_POST['insertProduct'])) {
        $productTitle = mysqli_real_escape_string($conn, $_POST['productTitle']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
        $productCategories = $_POST['productCategories'];
        $price = floatval($_POST['price']);
        $status = 'false';
    
        // Image upload handling
        $image1 = $_FILES['image1']['name'];
        $image2 = $_FILES['image2']['name'];
        $image3 = $_FILES['image3']['name'];
    
        $tempImage1 = $_FILES['image1']['tmp_name'];
        $tempImage2 = $_FILES['image2']['tmp_name'];
        $tempImage3 = $_FILES['image3']['tmp_name'];
    
        if (empty($productTitle) || empty($description) || empty($keyword) || empty($productCategories) || empty($price)) {
            echo "<script>alert('Please fill all the fields');</script>";
            exit();
        }
            // Directory to store uploaded images
            $uploadDir = "./Includes/ProductImages/";
    
           // if (move_uploaded_file($tempImage1, $uploadDir . $image1) &&
            //    move_uploaded_file($tempImage2, $uploadDir . $image2) &&
            //    move_uploaded_file($tempImage3, $uploadDir . $image3)) {
    
                $insertProductQuery = "INSERT INTO Product (productTitle, productDiscription, productKeywords, category_ID, productImage1, productImage2, productImage3, productPrice, date, status) 
                VALUES ('$productTitle', '$description', '$keyword', '$productCategories', '$image1', '$image2', '$image3', '$price', NOW(), '$status')";
    
                if (mysqli_query($conn, $insertProductQuery)) {
                    echo "<script>alert('Content Inserted Successfully');</script>";
                } else {
                    echo "Error: " . $insertProductQuery . "<br>" . mysqli_error($conn);
                }
    }
    ?>

</body>
</html>