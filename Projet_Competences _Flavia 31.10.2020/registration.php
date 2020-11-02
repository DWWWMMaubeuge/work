<?php

include_once(  "CO_functions.php"  );
echo "<html><head><link rel='stylesheet' type='text/css' href='style.css'></head><body>";

if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email       = $_POST['email'];
    $password   = $_POST['password'];


    $req = "INSERT INTO flavia.users ( name, surname, email, password ) VALUES ( '$name', '$surname', '$email', '".hash('sha256', $password)."')";
    executeSQL( $req );
    header( "location: homePage.php");
}

?>
<h1> Formulaire d'inscription </h1>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='name' placeholder="votre nom ici">
<br>
<INPUT type='text' name='surname' placeholder="votre prenom">
<br>
<INPUT type='text' name='email' placeholder="votre mail">
<br>
<INPUT type='text' name='password' placeholder="votre mot de passe">
<br>
<INPUT type='submit' value='OK'>
</FORM>