<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

    include "./includes/dbh.inc.php"; 
    include "./includes/Home.Function.php"; 
    include "Main.Header.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse</title>
    <link rel="stylesheet" href="../Style/Home.product.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <!-- search -->
    <section class="search">
        <form action="#" method="GET">
            <input type="text" placeholder="what you are looking for" class="searchBar" name="searchData">
            <input type="submit" class="searchBtn" value="Search" name="searchDataProduct">
        </form>


    </section>
    <!-- brows category -->
    <section class="browse">
        <div class="browseContainer">
            <h1>Category</h1>
            <ul>
            <?php
                getCategory(); //calling funtion inside the include/home file
            ?>
            </ul>
        </div>
     </section>

    <!-- cards -->
    <div class="galary">
        <?php
        getProducts();
        getUniqueCategories();
        ?>
    </div>

    
</body>
</html>
<?php
    include "Main.Footer.php";
?>