<?php 

session_start();
$_SESSION[ 'ID_user' ]  = 0;

include_once("functionConnect.php");
include_once("functionHeader.php");
setHearder();
NavBar();



if( $_POST && $_POST['email'] != "" && $_POST['password'] != ""  ) 
{
    $email       = $_POST['email'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE email='$email' AND password='$password'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 1 )
    {
        $req = "SELECT * FROM $DB_dbname.users WHERE email='$email' AND password='$password'";
        $result = executeSQL( $req );
        $data = $result->fetch_assoc();
        
        $_SESSION[ 'ID_user' ]  = $data[ 'id' ];
        $_SESSION[ 'name' ]     = $data[ 'name' ];
        $_SESSION[ 'surname' ]  = $data[ 'surname' ];
        // vérifier si l'utilisateur est un administrateur ou un utilisateur
        if ($data['type'] == 'admin') 
        {
            header('location: admin/home.php');      
        }
        elseif ($data['type'] == 'teacher')
        {
            header('location: admin/home2.php' );
        }
        else
        {
            header('location: skills.php');
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
             <INPUT type='text' name='email' placeholder="Your email">
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