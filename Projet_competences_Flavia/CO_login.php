<?php 

session_start();
$_SESSION[ 'ID_user' ]  = 0;

include_once("CO_bdd.php");
include_once("CO_header.php");
setHeader();
NavBar();



if( $_POST && $_POST['mail'] != "" && $_POST['password'] != "") 
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
        $_SESSION[ 'name' ]     = $data[ 'name' ];
        $_SESSION[ 'surname' ]  = $data[ 'surname' ];
        // vérifier si l'utilisateur est un administrateur ou un utilisateur
        if ($data['type'] == 'admin') 
        {
            header('location: CO_home.php');      
        }
        elseif ($data['type'] == 'trainer')
        {
            header('location: CO_trainerHome.php' );
        }
        else
        {
            header('location: CO_resultskills.php');
        }
    }
    else{
        $message = "incorrect password or email.";
    }
}


?>


<body>
    
<div class="login-box">
    <FORM  method='POST' action="<?=$_SERVER['PHP_SELF']; ?>">
        <div class="bg-image">
        </div>
        
        <h1>Login</h1>
        
        <div  class="textbox">
             <i class="fas fa-envelope"></i>
             <INPUT type='text' name='mail' placeholder="Your email">
        </div>

        <div  class="textbox">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Password" name="password" value="">
        </div>
        
        <input class="btn" type="submit" name="btn" value="Log in">
    </FORM>
</div>
</body>
</html>