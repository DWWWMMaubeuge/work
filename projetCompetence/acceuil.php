<?php 


include_once("functionConnect.php");


if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "INSERT INTO skills.users ( name, surname, password ) VALUES ( '$name', '$surname', '$password' )";
    executeSQL( $req );
    header( "location: skills.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="login-box">
        <div class="bg-image"></div>
        <h1>Login</h1>
        <div  class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="Surname" name="surname" value="">
</div>

<div  class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="Name" name="name" >
</div>
    <div  class="textbox">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" placeholder="Password" name="password" value="">
    </div>

    <input class="btn" type="button" name="" value="Log in">
</div>
</body>
</html>