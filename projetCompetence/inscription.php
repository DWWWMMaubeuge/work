
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="style.css">
</head>
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
    header( "location: acceuil.php");
}

?>
