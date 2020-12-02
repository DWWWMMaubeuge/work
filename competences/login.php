<?php
require_once( "parametres.php" );
include_once( "CO_global_functions.php"  );

session_start();
$_SESSION[ 'ID_user' ]  = 0;



if(     isset($_POST)               && 
        isset($_POST['mail'])       &&       
        isset($_POST['password'])   &&
        ( $_POST['mail'] != ""    ) && 
        ( $_POST['password'] != "") 
  )
{
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    //echo $password;
    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
        $result = executeSQL( $req );
        $data = $result->fetch_assoc();

        $_SESSION[ 'role' ]          = $data[ 'role' ];
        $_SESSION[ 'ID_formation' ]  = $data[ 'id_formation' ];
        $_SESSION[ 'ID_user' ]       = $data[ 'id' ];
        $_SESSION[ 'name' ]          = $data[ 'name' ];
        $_SESSION[ 'surname' ]          = $data[ 'name' ];

        initSecurity();
        

        $role = $_SESSION[ 'role' ];
        if ( $role == 'ADM' )
            header( "location: admin.php");
        else if( $role == 'FOR' )
            header( "location: formateur.php");
        else if ( $role == 'STA' )
            header( "location: stagiaire.php");
        else
            header( "location: erreur.php");
    }
    echo "<h3>login incorrect</h3>";
}
?>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='mail' placeholder="votre mail">
<br>
<INPUT type='text' id="PWX" name='password' placeholder="votre mot de passe">
<INPUT type='hidden' id="PWXc" name='passwordc'>
<br>
<INPUT type='submit' value='OK' onclick="encodePW()">
</FORM>