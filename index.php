<?php
    require_once("config.php");
    $buttonName= mysqli_query($link, "SELECT * FROM buttons ORDER By id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REDI Games</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"> 
</head>
<body>
    <div style="display:block;" class="heading">
        <a href="index.php"><img src="img/redi-logo.svg" alt=""></a>
    </div>
    <div class="buttons">
        <?php
            while($row=mysqli_fetch_array($buttonName)){
        ?>
        <div class="button">
            <div>
                <a href="https://<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
            </div>
           
        </div>
            <?php } ?>    
       
       
    </div>
    <div class="footer">
        <p>We create games.</p>
        <p>And we make it great.</p>
        <div class="img-bar">
            <a href="#"><img src="img/facebook.png" alt=""></a>
            <a href="#"><img src="img/instagram.png" alt=""></a>
            <a href="#"><img src="img/youtube.png" alt=""></a>
            <a href="#"><img src="img/bgg.png" alt=""></a>
        </div>
    </div>
<script src="script.js"></script>
</body>
</html>