<?php

include_once(  "CO_global_functions.php"  );

session_start();
$_SESSION[ 'ID_user' ]  = 0;



if( $_POST && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM xavier.users WHERE mail='$mail' AND password='$password'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM xavier.users WHERE mail='$mail' AND password='$password'";
        $result = executeSQL( $req );
        $data = $result->fetch_assoc();
        $_SESSION[ 'ID_user' ]  = $data[ 'id' ];
        $_SESSION[ 'name' ]  = $data[ 'name' ];
        $_SESSION[ 'surname' ]  = $data[ 'surname' ];
    
        header( "location: accueil01.php");
    }
    echo "<h3>login incorrect</h3>";
}

?>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='mail' placeholder="votre mail">
<br>
<INPUT type='text' name='password' placeholder="votre mot de passe">
<br>
<INPUT type='submit' value='OK'>
</FORM>