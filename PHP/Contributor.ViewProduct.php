<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./Admin.NavBar.php";

    include "./includes/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    <link rel="stylesheet" href="../Style/Contributor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="viewProduct">
        <table class="ViewProductTable">
            <thead>
                <tr>
                    <th>Content ID</th>
                    <th>Content Title</th>
                    <th>Content Image</th>
                    <th>Content Price</th>
                    <th>Sales</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>

          <?php 
            $selectContent= "SELECT * FROM Product";
            $selectContentResult = mysqli_query($conn,$selectContent);

            while($row = mysqli_fetch_assoc($selectContentResult)){

                $productId = $row['productId'];
                $productTitle = $row['productTitle'];
                $productImage1 = $row['productImage1'];
                $productPrice = $row['productPrice'];
                $status = $row['status'];
            ?>
                <tr>
                    <td><?php echo $productId ?></td>
                    <td><?php echo $productTitle ?></td>
                    <td><?php echo "<img src='../Product_Image/$productImage1'>" ?></td>
                    <td><?php echo $productPrice ?></td>
                    <td>not set</td>
                    <td><?php if($status == 'true'){ echo 'aprove'; }else{ echo 'pending';} ?></td>
                    <td><a href='Contributor.EditProduct.php?EditProduct=<?php echo $productId ?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
                    <td><a href='Contributor.DeleteProduct.php?DeleteProduct=<?php echo $productId ?>'><i class='fa-solid fa-trash-can'></i></a></td>
                </tr>
            
            <?php } ?>

            </tbody>
        </table>
    </div>

</body>
</html>
