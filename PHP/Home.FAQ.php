<?php

include "Main.Header.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="../Style/FAQ.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <div class="FAQContainer">
    <?php 
        $selectFaq = "SELECT * FROM FAQ;";
        $selectFaqResults = mysqli_query($conn,$selectFaq);
        while($row = mysqli_fetch_assoc($selectFaqResults)){

            $faqQuestion = $row['faqQuestion'];
            $faqAnswer = $row['faqAnswer'];
            
    ?>

        <div class="question_answer">
            <div class="question">
                <p class="que"><i class="fa-solid fa-circle-notch"></i><?php echo $faqQuestion; ?></p>
            </div>
            <div class="answer">
                <p class="ans"><i class="fa-solid fa-check"></i><?php echo $faqAnswer; ?></p>
            </div>
        </div>

        <?php } ?>

    </div>
</body>
</html>