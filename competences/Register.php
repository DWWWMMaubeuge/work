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

    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL( $req );
    header( "location: Login.php");
}

?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="css/style.login.css">
        <script src="https://www.google.com/recaptcha/api.js"></script>

        <title>Register</title>
    </head>
        <body>
    

    <FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <label for=""><h2>INSCRIPTION</h2></label>
        <INPUT type='text' name='name' placeholder="votre nom ici">
        <br>
        <INPUT type='text' name='surname' placeholder="votre prenom">
        <br>
        <INPUT type='text' name='mail' placeholder="votre mail">
        <br>
        <INPUT type='text' name='password' placeholder="votre mot de passe">
        <br>
        <!-- <INPUT type='submit' value='OK' -->
        <div class="g-recaptcha" data-sitekey="6LfHIuIZAAAAANFucggGUn8r_r5i9zvgiYoUHDQq"></div> 
        <br> 
        <input type="submit" value="Valider" name="submitpost'"> 
    </FORM>




     </body>
</html>


<!-- require_once('recaptcha/autoload.php'); 

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
        
      <div class="g-recaptcha" data-sitekey="6LfHIuIZAAAAANFucggGUn8r_r5i9zvgiYoUHDQq"></div> 
      <br/>  
        
        <input type="submit" value="Valider" name="submitpost'"> 
        
        
        <input type="hidden" id="recaptchaResponse" name="recaptcha-response">
        
        
        
        
        
        
        
        
        -->