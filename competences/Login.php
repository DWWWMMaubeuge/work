<?php
require_once "parametres.php";
include_once "GloBal_Functions.php";

session_start();
$_SESSION['ID_user'] = 0;

if ($_POST && $_POST['mail'] != "" && $_POST['password'] != "") 
{
            $mail      = $_POST['mail'];
            $password  = $_POST['password'];

    // attention aux doublons des mail

    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
    $result = executeSQL($req);
    $data = $result->fetch_assoc();
    if ($data['nb'] == 1) 
        {
            $req = "SELECT * FROM $DB_dbname.users WHERE mail='$mail' AND password='$password'";
            $result = executeSQL($req);
            $data = $result->fetch_assoc();
            $_SESSION['ID_user']        = $data['id'];
            $_SESSION['id_formation']   = $data['id_formation'];
            $_SESSION['name']           = $data['name'];
            $_SESSION['surname']        = $data['surname'];
            $role = $_SESSION['role']   = $data['role'];
            //print_r ($data);
            
            if ( $role == "STA")
                header("location: Home.php");
            else if ( $role == "ADM")
                header("location: admin.php");
            else if ( $role == "FOR")
                header("location: formateur.php");
            else
                header("location: login.php");
            
        }
    echo "<h3>login incorrect</h3>";            
}
?>
<!DOCTYPE html> 
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <script src="https://kit.fontawesome.com/30abe9456d.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="css/style.login.css">
            <title>LOGIN</title>
        </head>
    <body>

<!-- <div id="bg"></div> -->

    <form  method='POST'action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <img src="img/logo6.png" alt="">
        <h2 style=height:15%>CONNEXION</h2>
        <input type="email" name="mail" id="" placeholder="Mail" class="mail"  >
        <label for=""></label>
        <input type="password" name="password" id="" placeholder="Password" class="pass">
        <button type="submit">login to your account</button>
    </form>

    </body>
</html>