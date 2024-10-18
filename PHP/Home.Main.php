<?php
include "./includes/dbh.inc.php";
include "./includes/Home.Function.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../Style/Home.css">
</head>
<body>

<?php

include "Main.Header.php"; 
?>
     <!-- about -->
     <section class="about">
            
        <h3 id="targetTextarea">Groove Haven</h3>
        <h1 id="storeTitle">Your Ultimate Entertainment Destination</h1>
        <p> Welcome to Groove Haven, where the rhythms of music, the magic of cinema, and the thrill of gaming converge. Dive into a world where entertainment knows no bounds. Discover, explore, and immerse yourself in a symphony of audiovisual experiences. Get ready to embark on an unforgettable journey through the realms of sound, story, and adventure. Join us at EntertainMix ."</p>
        
          
            <?php

            if(isset($_SESSION["role"])){
                echo "<a href='./Home.Product.php' class='button'>Browse</a>";
            } else {
                echo "<a href='./User.Loging.php' class='button'>Join</a>";
            }
            ?>

    </section>
    <div class="HomeTitle">
            <p>new Avilable</p>
    </div> 
    <div class="galary">
        <?php
        newAvilableProduct();
        ?>
    </div>

 
    <script src="../JS/home.js"></script>
</body>

</html>
<?php
    include "Main.Footer.php";
?>
