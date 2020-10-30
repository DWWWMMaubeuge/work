<?php

include_once(  "CO_functions.php"  );
echo "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";

session_start();
$_SESSION[ 'ID_user' ]  = 0;



if( $_POST && $_POST['email'] != "" && $_POST['password'] != "" ) 
{
    $email       = $_POST['email'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM flavia.users WHERE email='$email' AND password='$password'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM flavia.users WHERE email='$email' AND password='$password'";
        $result = executeSQL( $req );
        $data = $result->fetch_assoc();
        $_SESSION[ 'ID_user' ]  = $data[ 'id' ];
        $_SESSION[ 'name' ]  = $data[ 'name' ];
        $_SESSION[ 'surname' ]  = $data[ 'surname' ];
    
        header( "location: homePage.php");
    }
    echo "<h3>login incorrect</h3>";
}

?>
<h1> Login </h1>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='email' placeholder="votre mail">
<br>
<INPUT type='text' name='password' placeholder="votre mot de passe">
<br>
<INPUT type='submit' value='OK'>
</FORM>