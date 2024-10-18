<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "./includes/dbh.inc.php";
include "Main.Header.php";


if (!isset($_SESSION['userid'])) {
    echo "<script>alert('Please log in');</script>";
    echo "<script>window.open('./User.Loging.php','_self')</script>";
    exit();
}

$userId = $_SESSION['userid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../Style/Home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="viewCart">
    <i class="fa-regular fa-money-bill-1"></i>
        <table class="ViewProductTable">
            <thead>
                <tr>
                    <th>Content Title</th>
                    <th>Content Price</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            // Query to join the BuyProduct and Product tables based on product_id
            $selectContent = "SELECT BuyProduct.*, Product.productTitle, Product.productPrice,Product.productId
                              FROM BuyProduct
                              INNER JOIN Product ON BuyProduct.product_id = Product.productId
                              WHERE BuyProduct.user_id = $userId";

            $selectContentResult = mysqli_query($conn, $selectContent);

            $totalPrice = 0; // Initialize total price

            while ($row = mysqli_fetch_assoc($selectContentResult)) {
                $productId = $row['productId'];
                $productTitle = $row['productTitle'];
                $productPrice = $row['productPrice'];
                
                // Calculate the total price
                $totalPrice += (float) $productPrice;
            ?>
                <tr>
                    <td><?php echo $productTitle; ?></td>
                    <td><?php echo $productPrice; ?></td>
                    <td><a href='Cart.Remove.php?productId=<?php echo $productId; ?>'><i class="fa-solid fa-minus"></i></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <div class="action">
            <p>Total Price: RS. <?php echo number_format($totalPrice, 2); ?></p>
            <a href=''>Check Out</a>
        </div>
    </div>
</body>
</html>
