<?php 

session_start();
$_SESSION[ 'ID_user' ]  = 0;

include_once("function_connect.php");



if( $_POST && $_POST['mail'] != "" && $_POST['password'] != ""  ) 
{
    $email       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$email' AND password='$password'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
        $result = executeSQL( $req );
        $data = $result->fetch_assoc();
        $_SESSION[ 'ID_user' ]  = $data[ 'id' ];
        $_SESSION[ 'name' ]     = $data[ 'name' ];
        $_SESSION[ 'surname' ]  = $data[ 'surname' ];
    
        header( "");
    }
    echo "<h3>login incorrect</h3>";
}


// créer le formulaire de connexion


