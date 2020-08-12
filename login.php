<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    require_once("config.php");
    if(isset($_POST['submit'])){
        $login=$_POST['login'];
        $password=$_POST['password'];
        $sql="SELECT * from uzytkownicy where login='$login' and password='$password' ";
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1) {
           
           $_SESSION['login_user'] = $login;
           header("location: admin.php");
        }else {
           echo "Your Login Name or Password is invalid";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style-login.css" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet"> 
</head>
<body>
    <div class="wrap">
     <a href="index.php"><img src="img/redi-logo.svg" alt=""></a>
        <div class="cell">
           
            <form action="login.php" method="POST">
                <h2>Logowanie</h2>
                <input type="text" placeholder="login" name="login">
                <input type="password" placeholder="hasło" name="password">
                <input class="submit" type="submit" value="Wyślij" name="submit">
            </form>
        </div>
    </div>
</body>
</html>