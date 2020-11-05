<?php
include "Entete.php";
HEAD("Page d'inscription");
include_once(  "Connect.php"  );


if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL( $req );
    header( "location: Accueil.php");
}

?>
<body>

<div class="login-box">
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="bg-image"></div>
<h1>Register Form</h1>
<div  class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="surname" name="surname" >
</div>
<div  class="textbox">
            <i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder="name" name="name" >
</div>
<div  class="textbox">
<i class="fas fa-envelope"></i>
<input type="text" placeholder="mail" name="mail">
</div>
<div  class="textbox">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" placeholder="password" name="password" value="">
    </div>
<INPUT class="btn" type='submit' value='Sign in'>
</div>
</FORM>

</body>
</html>

