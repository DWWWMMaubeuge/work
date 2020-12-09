<?php 
$dbname="utilisateur";
session_start();
$_SESSION[ 'ID_user' ]  = 0;

include_once("function_connect.php");
include_once("header.php");
echo entete2("login");
include "navbar.php";

if( $_POST && $_POST['mail'] != "" && $_POST['password']  ) 
{
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];
    

    $req = "SELECT count(*) as nb FROM $dbname.users WHERE mail='$mail' AND password='$password' ";
    $result = executeSQL( $req );
    $data = $result->fetch(PDO::FETCH_ASSOC);
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM $dbname.users WHERE mail='$mail' AND password='$password' ";
        $result = executeSQL( $req );
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $_SESSION[ 'ID_user' ]  = $data[ 'id' ];
        $_SESSION[ 'name' ]     = $data[ 'name' ];
        $_SESSION[ 'surname' ]  = $data[ 'surname' ];
        $_SESSION[ 'mail' ]     = $data[ 'mail' ];
        $_SESSION[ 'date_inscription' ]  = $data[ 'date_inscription' ];
        $bdd = null;
        header( "location:accueil.php");
    }
     $erreur = "<h3>login incorrect veuillez réessayer svp !</h3>";
    $bdd = null;
}

?>
<div>
<?php
echo nav("");
?>
</div>
<body>    
    <div class="formulaire container">
        <FORM  method='POST' action="<?=$_SERVER['PHP_SELF']; ?>">
            <div class="">
                <div class="inscr">
                <h1>Connexion</h1>
                    <div class="pad">
                        <label class="" for="mail">Mail :</label>
                        <INPUT type='mail' name='mail' placeholder="Your mail">
                    </div>
                    <div class="pad">
                        <label class="" for="password">Mot de Passe :</label>
                        <input type="password" placeholder="Password" name="password" value="">
                    </div>
                    <div class="pad1">
                        <input type="submit" class="pad1"  value="Je me connecte">
                    </div>
                    <div class="a">
                        <a href="inscription.php">pas encore de compte? cliquez ici !</a>
                    </div>
                    <div class="a">
                        <a href="accueil.php">pas maintenant, retour au menu !</a>
                    </div>    
                </div>
            </div> 
        </FORM>
        <?php
        if(isset($erreur))
        {
            echo $erreur;
        }
        ?>    
    </div>
<?php

Include "footer.php";
echo footer();

?>

</body>
</html>



