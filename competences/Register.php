<?php
require_once('recaptcha/autoload.php');
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

if(isset($_POST['submitpost']))  
{ 
    if(isset($_POST['g-Recaptcha-Response'])) 
    { 
     $recaptcha = new \ReCaptcha\ReCaptcha('6LfHIuIZAAAAAImcpkuK6yZ-UBKcQycnVak8eGUZ ');
        $resp = $recaptcha ->verify($_POST['g-Recaptcha-Response'] ) ;
            if ($resp->isSuccess()) 
            {
                echo" ('Captcha Valide')";
                            // Verified!
            } 
            elseif($resp->getErrorCodes())
            {
            
                echo"('Captcha Invalide')";
            } 
            else 
            {
                var_dump ('captcha non rempli');
            }
    } 
}


if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail
    
    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password, role ) VALUES ( '$name', '$surname', '$mail', '$password','STA' )";
    executeSQL( $req );
    header( "location: Login.php");
}
 



if (isset($_POST['mail'])) {

// EDIT THE 2 LINES BELOW AS REQUIRED
$mail= "devafpa2020@gmail.com";
//$mail_to = "@live.fr";
$mail_subject = "RECLAMATION";

function died($error)
{
    // your error code can go here
    echo
        "Nous sommes désolés, mais des erreurs ont été détectées dans le" .
        " formulaire que vous avez envoyé. ";
    echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
    echo $error . "<br /><br />";
    echo "Merci de corriger ces erreurs.<br /><br />";
    die();
}

 // si la validation des données attendues existe
if (!isset($_POST['name']) ||
    !isset($_POST['surname']) ||
    !isset($_POST['mail']) ||
    !isset($_POST['telephone']) ||
    !isset($_POST['commentaire'])) {
    died(
        'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
        ' problème.');
} 

$name = $_POST['name']; // required
$surname = $_POST['surname']; // required
$mail = $_POST['mail']; // required
$telephone = $_POST['telephone']; // not required
$commentaire = $_POST['commentaire']; // required

$error_message = "";
$mail_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

if (!preg_match($mail_exp, $mail)) {
    $error_message .=
        'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
}

// Prend les caractères alphanumériques + le point et le tiret 6
$string_exp = "/^[A-Za-z0-9 .'-]+$/";

if (!preg_match($string_exp, $name)) {
    $error_message .=
        'Le name que vous avez entré ne semble pas être valide.<br />';
}

if (!preg_match($string_exp, $surname)) {
    $error_message .=
        'Le préname que vous avez entré ne semble pas être valide.<br />';
}

if (strlen($commentaire) < 2) {
    $error_message .=
        'Le commentaire que vous avez entré ne semble pas être valide.<br />';
}

if (strlen($error_message) > 0) {
    died($error_message);
}

$mail_message = "Détail.\n\n";
$mail_message .= "name: " . $name . "\n";
$mail_message .= "surname: " . $surname . "\n";
$mail_message .= "mail: " . $mail . "\n";
$mail_message .= "Telephone: " . $telephone . "\n";
$mail_message .= "Commentaire: " . $commentaire . "\n";

// create mail headers
$headers = 'From: ' . $mail . "\r\n" .
'Reply-To: ' . $mail . "\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($mail, $mail_subject, $mail_message, $headers);


?>



<p style=text-align:center>Notre service client est à votre écoute pour vous conseiller. Laissez-nous vos coordonnées, nous vous contacterons très vite..</p>

<!-- Merci de nous avoir contacter. Nous vous contacterons très bientôt. -->


<?php

}

?>

<!DOCTYPE html>
    <html lang="fr">  
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/style.login.css">
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <title>Register</title>
        
    </head>
        <body>
        <!-- <img src="img/logo3.png" alt=""> -->

            <FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <img src="img/logo6.png" alt=""> 
                <label for=""><h2>INSCRIPTION</h2></label>
                <INPUT type='text' name='name' placeholder="votre name ici">
                <br>
                <INPUT type='text' name='surname' placeholder="votre surname">
                <br>
                <INPUT type='mail' name='mail' placeholder="votre mail">
                <br>
                <INPUT type='text' name='password' placeholder="votre mot de passe">
                <br>
                <div class="g-recaptcha" id="captcha" data-theme="dark" data-sitekey="6LfHIuIZAAAAANFucggGUn8r_r5i9zvgiYoUHDQq"></div> 
                <br> 
                <p class="box-register">Déjà inscrit? <a href="login.php">Connectez-vous ici</a></p>
                <input type="submit" value="Valider" name="submitpost'"> 
                
            </FORM>

     </body>
</html>