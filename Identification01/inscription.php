<?php
session_start();


if (isset($_POST['login']) && isset($_POST['pwd'])) 
{
    // on la démarre :)
    
    $login = $_POST['login'];
    $pwd   = $_POST['pwd'];

    $users[ $login ] = $pwd;

    $_SESSION['users'] = $users;

    $_SESSION['user'] = $login;
    
    header ('location: page_membre.php');
}





?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="Formulaire.css">    
</head>    
<body>    
    <h2>inscription</h2><br>    
    <div class="login">    
    <form id="login" method="POST" action="inscription.php">    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="login" id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="pwd" id="Pass" placeholder="Password">    
        <br><br>    
        <input type="submit" name="log" id="log" value="Log In Here">       
        <br><br>    
        <input type="checkbox" id="check">    
        <span>Remember me</span>    
        <br><br>    
        Forgot <a href="#">Password</a>    
    </form>     
</div>    
</body>    
</html> 