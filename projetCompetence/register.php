<?php

include_once("functionHeader.php");

<<<<<<< HEAD:projetCompetence/inscription.php
<<<<<<< HEAD


if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email       = $_POST['email'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

<<<<<<< HEAD
    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$email', '$password' )";
=======
    $req = "INSERT INTO $DB_dbname.users ( name, surname, email, password ) VALUES ( '$name', '$surname', '$email', '$password' )";
>>>>>>> bfcd6faddea4a74667107085de82ce6db9c86a30
    executeSQL( $req );
    header( "location: acceuil.php");
}

?>
=======
>>>>>>> 3fbc7efe1b6eaac56e12b73df8a1be962ba4d9b1
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="style.css">
</head>
=======
setHearder();
NavBar()
;
?>
>>>>>>> 665dadfea4c816f184ca46d4bb10f1f6be18f726:projetCompetence/register.php
<body>

<div class="login-box">
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="bg-image"></div>
<h1>Register Form</h1>
<div  class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="Surname" name="surname" >
</div>
<div  class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="Name" name="name" >
</div>
<div  class="textbox">
<i class="fas fa-envelope"></i>
<input type="text" placeholder="Email" name="email">
</div>
<div  class="textbox">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" placeholder="Password" name="password" value="">
    </div>
<INPUT class="btn" type='submit' value='Sign in'>
</div>
</FORM>
<?php

include_once("functionConnect.php");



if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['email'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $email       = $_POST['email'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "INSERT INTO $DB_dbname.users ( name, surname, email, password ) VALUES ( '$name', '$surname', '$email', '$password' )";
    executeSQL( $req );
    header( "location: logIn.php");
}

?>
