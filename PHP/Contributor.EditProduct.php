<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./Admin.NavBar.php";
include "./Includes/dbh.inc.php";

if (isset($_GET['EditProduct'])) {
    $EditProductId = $_GET['EditProduct'];

    $selectProductDetails = "SELECT * FROM Product WHERE productId = $EditProductId";
    $selectProductDetailsResult = mysqli_query($conn, $selectProductDetails);
    $row = mysqli_fetch_assoc($selectProductDetailsResult);

    $productTitle = $row['productTitle'];
    $productDiscription = $row['productDiscription'];
    $productKeywords = $row['productKeywords'];
    $category_ID = $row['category_ID'];
    $productImage1 = $row['productImage1'];
    $productImage2 = $row['productImage2'];
    $productImage3 = $row['productImage3'];
    $productPrice = $row['productPrice'];

    $selectCategoryDetails = "SELECT * FROM Category WHERE categoryId = $category_ID";
    $selectCategoryDetailsResults = mysqli_query($conn, $selectCategoryDetails);
    $rowCategory = mysqli_fetch_assoc($selectCategoryDetailsResults);
    $selectCategoryTitle = $rowCategory['categoryTitle'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/Contributor.css">
    <title>Update Product</title>
</head>
<body>
    <div class="ProductContainer">
        <div class="InsertProduct">
            <div class="title">
                <label for="Category Title">Add new Product</label>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">

                <label for="Product Title">Product Title</label>
                <input type="text" name="productTitle" autocomplete="off" required="required" value="<?php echo $productTitle; ?>">

                <label for="Product Description">Product Description</label>
                <input type="text" name="description" required="required" value="<?php echo $productDiscription; ?>">

                <label for="Product Keywords">Product Keywords</label>
                <input type="text" name="keyword" required="required" value="<?php echo $productKeywords; ?>">

                <label for="Category Title">Select Product Category</label>
                <select name="productCategories">
                    <option value="<?php echo $category_ID; ?>"><?php echo $selectCategoryTitle; ?></option>
                    <?php 
                    $selectQuery = "SELECT * FROM Category";
                    $resultSelectQuery = mysqli_query($conn, $selectQuery);

                    while ($row = mysqli_fetch_assoc($resultSelectQuery)) {
                        $categoryId = $row['categoryId'];
                        $categoryTitle = $row['categoryTitle'];

                        echo "<option value='$categoryId'>$categoryTitle</option>";
                    }
                    ?>
                </select>

                <label for="Insert Image 1">Insert Image 1</label>
                <input type="file" name="image1">

                <label for="Insert Image 2">Insert Image 2</label>
                <input type="file" name="image2">

                <label for="Insert Image 3">Insert Image 3</label>
                <input type="file" name="image3">

                <label for="Product Price">Product Price</label>
                <input type="text" name="price" required="required" value="<?php echo $productPrice; ?>">

                <input class="submitBtn" type="submit" name="EditContent" value="Update Content">
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['EditContent'])) {
        // Sanitize and validate user inputs
        $title = mysqli_real_escape_string($conn, $_POST['productTitle']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $keyword = mysqli_real_escape_string($conn, $_POST['keyword']);
        $productCategories = $_POST['productCategories'];
        $price = floatval($_POST['price']); // Convert to float for price

        // Handle file uploads
        $image1 = $_FILES['image1']['name'];
        $image2 = $_FILES['image2']['name'];
        $image3 = $_FILES['image3']['name'];
        
        $tempImage1 = $_FILES['image1']['tmp_name'];
        $tempImage2 = $_FILES['image2']['tmp_name'];
        $tempImage3 = $_FILES['image3']['tmp_name'];

        move_uploaded_file($tempImage1, "./Includes/ProductImages/$image1");
        move_uploaded_file($tempImage2, "./Includes/ProductImages/$image2");
        move_uploaded_file($tempImage3, "./Includes/ProductImages/$image3");

        // Update product
        $updateProduct = "UPDATE Product SET productTitle='$title', productDiscription='$description', productKeywords='$keyword', category_ID='$productCategories', productImage1='$image1', productImage2='$image2', productImage3='$image3', productPrice='$price', date=NOW(), status='false' WHERE productId='$EditProductId';";
        
        $updateProductResult = mysqli_query($conn, $updateProduct);

        if ($updateProductResult) {
            echo "<script>alert('Content Updated Successfully');</script>";
            echo "<script>window.open('./Contributor.ViewProduct.php','_self')</script>";
        } else {
            echo "<script>alert('Content Update Failed');</script>";
        }
    }
    ?>
</body>
</html>
