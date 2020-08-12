<?php
    require_once("config.php");
    session_start();
    error_reporting(E_ALL);
    if(isset($_POST['logout'])){
        session_destroy();
        header("location:index.php");
    }
    if(!isset($_SESSION['login_user'])){
        echo "<h1>Nie masz uprawnień aby tu wejść</h1>";
        exit;
    }
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $url=$_POST['link'];
        $fixedUrl = str_replace('https://www.', '', $url); 
        if(!mysqli_query($link,"INSERT INTO buttons (name,link) VALUES ('$name','$fixedUrl')")){
            echo("Error description: " . mysqli_error($link));
        }

    }
    if(isset($_GET['del_btn'])){
        $id=$_GET['del_btn'];
        mysqli_query($link,"DELETE FROM buttons where id=$id");
        header("Location:admin.php");
    }
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
    <div class="heading">
        <img src="img/redi-logo.svg" alt="">
    </div>
    <div id="add" class="heading">
        <img src="img/add.png" alt="">
    </div>
    <form id="form" action="admin.php" method="POST">
        <input type="text" placeholder="Opis przycisku" name="name" class="task_input">
        <input type="text" placeholder="Link:  google.com" name="link" class="task_input">
        <button type="submit" class="task_btn" name="submit" >Dodaj przycisk</button>
    </form>
    <div class="buttons">
        <?php
            while($row=mysqli_fetch_array($buttonName)){
        ?>
        <div class="button">
            <div>
                <a href="https://<?php echo $row['link']; ?>"><?php echo $row['name']; ?></a>
            </div>
           <a href="admin.php?del_btn=<?php echo $row['id']; ?>"><img class="delete" src="img/delete.png" alt=""></a>
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
    <form style="display:block;" class="logout" method="POST" action="admin.php">
                <input type="submit" value="wyloguj się" name="logout">
    </form>
<script src="script.js"></script>
</body>
</html>