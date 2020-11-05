<?php
session_start();
$users = $_SESSION['users'];

if (isset($_POST['login']) && isset($_POST['pwd'])) 
{
		
    $login = $_POST['login'];
    $pwd   = $_POST['pwd'];

    foreach( $users as $log => $pw )
        if ( $log == $login && $pw == $pwd )
        {
            $_SESSION['user'] = $login;
            header ('location: page_membre.php');
        }

    //echo '<body onLoad="alert(\'Membre non reconnu...\')">';
    // puis on le redirige vers la page d'accueil
    //echo '<meta http-equiv="refresh" content="0;URL=index.htm">';
}
?>

<!DOCTYPE html>    
<html>    
<head>    
    <title>Login Form</title>    
    <link rel="stylesheet" type="text/css" href="Formulaire.css">    
</head>    
<body>    
    <h2>Login Page</h2><br>    
    <div class="login">    
    <form id="login" method="POST" action="login.php">        
        </label>    
        <input type="text" name="login" id="log" placeholder="login">    
        <br><br>    
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