<?php 

session_start();
$_SESSION[ 'ID_user' ]  = 0;

include_once("functionConnect.php");



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
    
        header( "location: skills.php");
    }
    echo "<h3>login incorrect</h3>";
}

/*if (isset($_POST["btn"])) {
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $password   = $_POST['password'];
if(empty( $name ) || empty($surname) || empty($password ) ){
    echo "Please Complet all data";
} else {
    $selectBd = mysqli_query($conn ,"SELECT * FROM skills.users WHERE name = '$name AND surname = $surname AND password = '$password'" );
    $row = mysqli_fetch_array($selectBd);
    if ($row["name"] == $name && $row["surname"] == $surname && $row["password"] == $password){
        executeSQL( $selectBd );
        header( "location: skills.php");
        echo "Welcome".$row["name"]."in your Account";
    }else{
        echo "Incorrect Data";
    }
}
}
/*if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $password   = $_POST['password'];
    // attention aux doublons des mail
    $req = "INSERT INTO skills.users ( name, surname, password ) VALUES ( '$name', '$surname', '$password' )";
    executeSQL( $req );
    header( "location: skills.php");
}
*/

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
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