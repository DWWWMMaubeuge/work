<?php 
$dbname="utilisateur";
session_start();
$_SESSION[ 'ID_user' ]  = 0;

include_once("function_connect.php");



if( $_POST && $_POST['mail'] != "" && $_POST['password'] != ""  ) 
{
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM $dbname.users WHERE mail='$mail' AND password='$password'";
    $result = executeSQL( $req );
    $data = $result->fetch(PDO::FETCH_ASSOC);
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM $dbname.users WHERE mail='$mail' AND password='$password'";
        $result = executeSQL( $req );
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION[ 'ID_user' ]  = $data[ 'id' ];
        $_SESSION[ 'name' ]     = $data[ 'name' ];
        $_SESSION[ 'surname' ]  = $data[ 'surname' ];
        $bdd = null;
        header( "location:accueil.php");
    }
    echo "<h3>login incorrect</h3>";
    $bdd = null;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    
<div class="login-box">
    <FORM  method='POST' action="<?=$_SERVER['PHP_SELF']; ?>">
        <div class=""></div> 
        <h1>Login</h1>
        <div  class="textbox">
             <i class="fas fa-envelope"></i>
             <INPUT type='text' name='mail' placeholder="Your mail">
        </div>

        <div  class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="password" value="">
        </div>
        
        <input class="btn" type="submit" name="btn" value="Log in">
    </FORM>
</div>
</body>
</html>



faire un champ date : alter ... 
date  :::  defaut now ; chercher code 
faire la page de fin de session ou avec une function js