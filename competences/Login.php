<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

session_start();
$_SESSION[ 'ID_user' ]  = 0;



if( $_POST && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
        $result = executeSQL( $req );
        $data = $result->fetch_assoc();
        $_SESSION[ 'ID_user' ]  = $data[ 'id' ];
        $_SESSION[ 'name' ]  = $data[ 'name' ];
        $_SESSION[ 'surname' ]  = $data[ 'surname' ];
    
        header( "location: Home.php");
    }
    echo "<h3>login incorrect</h3>";
}

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/30abe9456d.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/style.login.css">
            <title>LOGIN</title>
        </head>
    <body>
    




<!-- <FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='mail' placeholder="votre mail">
<br>
<INPUT type='text' name='password' placeholder="votre mot de passe">
<br>
<INPUT type='submit' value='OK'>
</FORM>  -->

<div id="bg"></div>

        <form  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>"
            
                    <label for=""><h2>CONNEXION</h2></label>
                    
                    <input type="text" name="mail" id="" placeholder="mail" class="mail"  >
                    
                    <label for=""></label>
                    <input type="password" name="password" id="" placeholder="password" class="pass">
                        
                    <button type="submit">login to your account</button>
            
        </form> 


    </body>
</html> 

<!-- <span> <i class="fas fa-envelope"></i></span> -->