<?php
require_once "parametres.php";
include_once "GloBal_Functions.php";

session_start();
$_SESSION['ID_user'] = 0;

if ($_POST && $_POST['mail'] != "" && $_POST['password'] != "") 
{
            $mail      = $_POST['mail'];
            $password  = $_POST['password'];
            $password = hash('sha256' , $_POST['password']);

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
    echo "<h3 class=\"login\">Login incorrect</h3>";            
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
        <div class="logo">
            <img src="img/logo7.png" alt="">
            <h2 margin-right=100px>CONNEXION</h2>
        </div>
        <?php if(isset($error_message)){  ?>
                <div class="error"><?php echo $error_message ; ?></div>
                <?php } ?>
        <input  type="email"     name="mail"     id="" placeholder="EMAIL" class="mail"  >
        <input  type="password"  name="password" id="" placeholder="MOT DE PASSE" class="pass">
        <p class="box-register">Mot de Passe oublier<a style="color:blue" font-size= 10px href="Register.php">S'inscrire</a></p>
        <button type="submit"   class="glow-on-hover" >SE CONNECTER</button>
    </form>

    </body>
</html>


<!-- <div class="logo">
            <img src="img/logo7.png" alt="">
            <h2 margin-right=100px>CONNEXION</h2>
        </div>


<button  type="submit">SE CONNECTER</button> -->