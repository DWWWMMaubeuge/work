<?php
include "Serveur.php";
include "Entete.php";
HEAD("Page d'inscription");



/*if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL( $req );
    header( "location: Skills.php");
}*/

?>
<body>

<div class="login-box">
    <FORM  method='POST' action="PageInscription.php">
        <?php include "Erreur.php"; ?>
        <div class="bg-image"></div>
        <h1>Inscription</h1>
        <div  class="input-group">
            <i class="fa fa-user" aria-hidden="true"></i>
            <input type="text" placeholder="Ton nom" name="surname" value="<?php echo $surname; ?>">
        </div>
        <div  class="input-group">
            <i class="fa fa-user" aria-hidden="true"></i>
        <input type="text" placeholder="Ton prénom" name="name" >
        </div>
        <div  class="input-group">
            <i class="fas fa-envelope"></i>
        <input type="text" placeholder="Ton mail" name="mail" value="<?php echo $mail; ?>">
        </div>
        <div  class="input-group">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Ton password" name="password_1" value="">
        </div>
        <div  class="input-group">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" placeholder="Confirme password" name="password_2" value="">
        </div>
        <div class="input-group">
            <button class="btn" type="submit" name="reg_user">Inscrit toi!</button>
        </div>
        <p>
            Déjà membre? <a href="PageLogin.php">Connecte toi!</a>
        </p>
        </div>
    </FORM>
</div>
</body>
</html>

