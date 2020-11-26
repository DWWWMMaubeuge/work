<?php
require_once('recaptcha/autoload.php');
require_once("parametres.php");
include_once( "GloBal_Functions.php");

/* ******************************CAPTCHA**************************************** */

/* if(isset($_POST['submitpost']))  
{ 
    if(isset($_POST['g-Recaptcha-Response'])) 
    { 
     $recaptcha = new \ReCaptcha\ReCaptcha('6LfHIuIZAAAAAImcpkuK6yZ-UBKcQycnVak8eGUZ');
        $resp = $recaptcha ->verify($_POST['g-Recaptcha-Response'] ) ;
            if ($resp->isSuccess()) {
                echo" ('Captcha Valide')";
                            // Verified!
            }elseif($resp->getErrorCodes()){
            
                echo"('Captcha Invalide')";
            }else{
                var_dump ('captcha non rempli');
            }
    } 
}  */

// Si la validation des données attendues existent 
if( $_POST && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['password'])) 
{

        $mail_to = "";
        //$email_to = "@live.fr";
        $mail_subject = "Invitation d'inscription";

        function erreur($error)
        {
            // your error code can go here
            echo "Nous sommes désolés, mais des erreurs ont été détectées dans le" .
                 " formulaire que vous avez envoyé. ";
            echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
            echo $error . "<br /><br />";
            echo "Merci de corriger ces erreurs.<br /><br />";
            die();
        }

    // si la validation des données attendues n'existent pas
    if (!isset($_POST['name']) ||!isset($_POST ['surname'])||!isset($_POST ['mail']) || !isset($_POST ['password'])) 
    {
    erreur('Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .' problème.');
    }
        $name     = $_POST['name'];     // required
        $surname  = $_POST['surname'];  // required
        $mail     = $_POST['mail'];     // required
        $password = $_POST['password']; // required
        //'".$_POST['mail']."'"
    
        /* **********************************les Conditions*************************************************** */

    //$error_message = "";
    $mail_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/'; /*  ========> REG EXPRE  */

            if (!preg_match($mail_exp, $mail)) {
                $error_message ='L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
            }
            // Prend les caractères alphanumériques + le point et le tiret 6
               $string_exp = "/^[A-Za-z0-9 .'-]+$/";
           //print_r($error_message);

            if (!preg_match($string_exp, $name)){   
                $error_message =   'Le nom que vous avez entré ne semble pas être valide.<br />';
            }
            if (strlen($name) <= 3) {
                $error_message =   'Le nom que vous avez entré ne semble pas être valide.<br />';
            }

            if (!preg_match($string_exp, $surname)) {
                $error_message = 'Le prénom que vous avez entré ne semble pas être valide.<br />';
            }

            if (strlen($surname) <= 3) {
                $error_message = 'Le prénom que vous avez entré ne semble pas être valide.<br />';
            }

            if (strlen($password) <= 4) {
                $error_message ='Le password que vous avez entré ne semble pas être valide.<br />';
            }
/* 
            if (isset($error_message) ) {
                erreur($error_message);
            } */

        $mail_message = "Détail.\n\n";
        $mail_message .= "name: " . $name . "\n";
        $mail_message .= "surname: " . $surname . "\n";
        $mail_message .= "mail: " . $mail . "\n";
        //$mail_message .= "password: " . $password . "\n";


        // create email headers ===> Parametres Sendmail 
        $headers = 'From: ' . $mail . "\r\n" .
        'Reply-To: ' . $mail . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
        mail($mail_to, $mail_subject, $mail_message, $headers);
        /* ?><?php */ 
            /* =====>**********************Temporaire********************** */
       /*      $req       = "SELECT count(*) as NB FROM $DB_dbname.users WHERE mail='$mail'";
            $result    = executeSQL( $req );
            $data      = $result->fetch_assoc();
            $doubleMail= $data[ 'NB' ];
            return  $doubleMail;
            echo " mail deja existant "; */
            if(!isset($error_message))
            {    //Verification doublon Mails
                $req       = "SELECT count(*) as NB FROM $DB_dbname.users WHERE mail='$mail'";
                $result    = executeSQL( $req );
                $data      = $result->fetch_assoc();
                //print_r($data);
                if($data['NB'] == 0)
                    {
                        // Ajouter Nouveaux Stagiaire
                        $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password, role ) VALUES ( '$name', '$surname', '$mail', '$password','STA' )";
                        executeSQL( $req );
                        header( "location: Login.php");
                        exit();
    
    
                    }else{
    
                    $error_message = "Email deja utlisé";
    
    
                    }


            

                



        }

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
           
            <FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="logo">
                    <img src="img/logo6.png" alt=""> 
                    <h2>INSCRIPTION</h2>
                </div>   
                <?php if(isset($error_message)){  ?>
                <div class="error"><?php echo $error_message ; ?></div>
                <?php } ?>
                <INPUT type='text' name='name' placeholder="Nom">
                <br>
                <INPUT type='text' name='surname' placeholder="Prenom">
                <br>
                <INPUT type='Email' name='mail' placeholder="Email">
                <br>
                <INPUT type='text' name='password' placeholder="Mot de passe">
                <br>
                <div class="g-recaptcha" id="captcha" data-theme="dark" data-sitekey="6LfHIuIZAAAAANFucggGUn8r_r5i9zvgiYoUHDQq"></div> 
                <br> 
                <p class="box-register">Déjà inscrit? <a style="color:blue"href="login.php">Connectez-vous ici</a></p>
                <input type="submit" value="Valider" name="submitpost'">    
            </FORM>
       </body>
</html> 


