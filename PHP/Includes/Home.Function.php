<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'dbh.inc.php';

//including products
function getProducts(){

        global $conn;
        
        //check isset or not
        if(!isset($_GET['category'])){

            $selectQuery = "SELECT * FROM Product ORDER BY rand()";
            $result = mysqli_query($conn,$selectQuery);

            while($row=mysqli_fetch_assoc($result)){
                $productId = $row['productId'];
                $productTitle = $row['productTitle'];
                $productDiscription = $row['productDiscription'];
                $productImage1 = $row['productImage1'];
                $productPrice = $row['productPrice'];
                $category_ID = $row['category_ID'];
                $status = $row['status'];
                
                if($status == 'false'){
                    continue;
                }

                echo "<div class='content'>
                <img src='./ProductImage/$productImage1' alt='$productTitle'>
                <h3>$productTitle</h3>
                <h6>Rs. $productPrice.00</h6>
                <ul>
                    <li><i class='fa-regular fa-star'></i></li>
                    <li><i class='fa-regular fa-star'></i></li>
                    <li><i class='fa-regular fa-star'></i></li>
                    <li><i class='fa-regular fa-star'></i></li>
                    <li><i class='fa-regular fa-star'></i></li>
                </ul>
                    <div class='btn viewMore'>
                        <a href='Home.Product_viewMore.php?productId=$productId'>Viwe more</a>
                    </div>
                    <div class='btn cart'>
                        <a href='Cart.Function.php?addedToCart=$productId ' >ADD CART</a>
                    </div>
                
                </div>";

            }
       }
}
//Get New Avilable list only 5 product
function newAvilableProduct(){

    global $conn;
    

        $selectQuery = "SELECT * FROM Product ORDER BY date LIMIT 5";
        $result = mysqli_query($conn,$selectQuery);

        while($row=mysqli_fetch_assoc($result)){
            $productId = $row['productId'];
            $productTitle = $row['productTitle'];
            $productDiscription = $row['productDiscription'];
            $productImage1 = $row['productImage1'];
            $productPrice = $row['productPrice'];
            $category_ID = $row['category_ID'];
            $status = $row['status'];
            
            if($status == 'false'){
                continue;
            }

            echo "<div class='content'>
            <img src='./ProductImage/$productImage1' alt='$productTitle'>
            <h3>$productTitle</h3>
            <h6>Rs. $productPrice.00</h6>
            <ul>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
            </ul>
                <div class='btn viewMore'>
                    <a href='Home.Product_viewMore.php?productId=$productId'>Viwe more</a>
                </div>
                <div class='btn cart'>
                     <a href='Cart.Function.php?addedToCart=$productId ' >ADD CART</a>
                </div>
            
            </div>";

        }
}
//get Random Product
function getRandomProducts(){

    global $conn;
    
    //check isset or not
    if(!isset($_GET['category'])){

        $selectQuery = "SELECT * FROM Product ORDER BY RAND() LIMIT 4";
        $result = mysqli_query($conn,$selectQuery);

        while($row=mysqli_fetch_assoc($result)){
            $productId = $row['productId'];
            $productTitle = $row['productTitle'];
            $productDiscription = $row['productDiscription'];
            $productImage1 = $row['productImage1'];
            $productPrice = $row['productPrice'];
            $category_ID = $row['category_ID'];
            echo "<div class='content'>
            <img src='./ProductImage/$productImage1' alt='$productTitle'>
            <h3>$productTitle</h3>
            <h6>Rs. $productPrice.00</h6>
            <ul>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
            </ul>
                <div class='btn viewMore'>
                    <a href='Home.Product_viewMore.php?productId=$productId'>Viwe more</a>
                </div>
                <div class='btn cart'>
                     <a href='Cart.Function.php?addedToCart=$productId ' >ADD CART</a>
                </div>
            
            </div>";

        }
   }
}
//gatting unique categories
function getUniqueCategories(){

    global $conn;
    
    //check isset or not
    if(isset($_GET['category'])){
       $category = $_GET['category'];

        $selectQuery = "SELECT * FROM Product WHERE category_ID = $category";
        $result = mysqli_query($conn,$selectQuery);

        //count no of rows and product not available in category display error msg
        $noOfRows = mysqli_num_rows($result);

        if($noOfRows<=0){
            echo "<h2 class='displayError'>SORRY! No File Found For This Category</h2>";
        }

        while($row=mysqli_fetch_assoc($result)){
            $productId = $row['productId'];
            $productTitle = $row['productTitle'];
            $productDiscription = $row['productDiscription'];
            $productImage1 = $row['productImage1'];
            $productPrice = $row['productPrice'];
            $category_ID = $row['category_ID'];
            echo "<div class='content'>
            <img src='./ProductImage/$productImage1' alt='$productTitle'>
            <h3>$productTitle</h3>
            <h6>Rs. $productPrice.00</h6>
            <ul>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
            </ul>
                 <div class='btn viewMore'>
                        <a href='Home.Product_viewMore.php?productId=$productId'>Viwe more</a>
                    </div>
                    <div class='btn cart'>
                        <a href='Cart.Function.php?addedToCart=$productId ' >ADD CART</a>
                </div>
            </div>";

        }
    }
}

//displaying category navigation
function getCategory(){

    global $conn;

        $selectCategoryQuery = "SELECT * FROM Category";
        $result = mysqli_query($conn, $selectCategoryQuery);
        
    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['categoryTitle'];
        $categoryId = $row['categoryId'];
        echo "<li><a href='Home.Product.php?category=$categoryId' >$title</a></li>";
    }
}
//search product ---------------------------------- not working --------------------------------------
function searchProduct(){
    global $conn;


    if(isset($_GET['searchDataProduct'])){
        
        $userSearchData = $_GET['searchDataProduct'];
        $searchQuery = "SELECT * FROM Product WHERE productKeywords LIKE '%$userSearchData%';";
        $result = mysqli_query($conn,$searchQuery);

        while($row=mysqli_fetch_assoc($result)){
            $productId = $row['productId'];
            $productTitle = $row['productTitle'];
            $productDiscription = $row['productDiscription'];
            $productImage1 = $row['productImage1'];
            $productPrice = $row['productPrice'];
            $category_ID = $row['category_ID'];
            echo "<div class='content'>
            <img src='./ProductImage/$productImage1' alt='$productTitle'>
            <h3>$productTitle</h3>
            <h6>Rs. $productPrice.00</h6>
            <ul>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
                <li><i class='fa-regular fa-star'></i></li>
            </ul>
                <div class='btn viewMore'>
                        <a href='Home.Product_viewMore.php?productId=$productId'>Viwe more</a>
                    </div>
                    <div class='btn cart'>
                        <a href='Cart.Function.php?addedToCart=$productId ' >ADD CART</a>
                    </div>
            </div>";

        }
    }
   
}
//----------------------------------------------------------------


//cart function

?>