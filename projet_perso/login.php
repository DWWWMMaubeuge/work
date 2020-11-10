<?php 
$dbname="utilisateur";
session_start();
$_SESSION[ 'ID_user' ]  = 0;

include_once("function_connect.php");
include_once("header.php");
echo entete2("login");


if( $_POST && $_POST['mail'] != "" && $_POST['password'] != "" && $_POST['password2'] ) 
{
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];
    $password2   = $_POST['password2'];

    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM $dbname.users WHERE mail='$mail' AND password='$password' AND password2='$password2'";
    $result = executeSQL( $req );
    $data = $result->fetch(PDO::FETCH_ASSOC);
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM $dbname.users WHERE mail='$mail' AND password='$password' AND password2='$password2'";
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

<body>    
    <div class="formulaire container">
        <FORM  method='POST' action="<?=$_SERVER['PHP_SELF']; ?>">
            <div class=""></div> 
            <h1>Login</h1>
            <div>
                <div>
                    <INPUT type='text' name='mail' placeholder="Your mail">
                </div>
                <div>
                    <input type="text" placeholder="Password" name="password" value="">
                </div>
                <div>
                    <input type="text" placeholder="Password2" name="password2" value="">
                </div>
                <div class="enter">
                    <input type="submit"  value="Log-in">
                </div>
                <div class="a">
                    <a href="inscription.php">pas encore de compte? cliquez ici !</a>
                </div>
                <div class="a">
                    <a href="accueil.php">pas maintenant, retour au menu !</a>
                </div>
            </div>      
        </FORM>
    </div>
</body>
</html>



faire un champ date : alter ... 
date  :::  defaut now ; chercher code 
