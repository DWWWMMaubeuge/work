<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );
include "MyLibrary.php";
entete();
logo();
nav(0);


if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['password'] != "" && $_POST['mail'] != ""  && $_POST['role'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $password   = $_POST['password'];
    $mail       = $_POST['mail'];
    $role       = $_POST['role'];

    // attention aux doublons des mail


    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL( $req );
    header( "location: accueil02_multiple.php");
}

?>



<h2 class="page-heading">Inscription</h2>
<div id="post-container">
  <section id="blogpost">
    <div class="card">
      <div class="card-image">
        <img src="img/20.jpg" alt="Card Image">
      </div>
      <div class="card-description">

        </p>
      </div>
    </div>

  </section>

  <aside id="sidebar">
    <h3>Inscris toi</h3>
    <p>
    <FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
<INPUT type='text' name='mail' placeholder="Votre nom">
<br>
<INPUT type='text' name='surname' placeholder="Votre prenom">
<INPUT type='text' name='mail' placeholder="Votre e-mail">
<br>
<div class="combobox">
      <select name="role" id="role" >
        <option value="ADM">Administrateur</option>
        <option value="FOR">Formateur</option>
        <option value="STA">Stagiaire</option>
      </select>
  </div>
<INPUT type='text' name='password' placeholder="Votre mot de passe">
<br>
<INPUT type='submit' value='OK' onclick="encodePW()">
</FORM>
<p class="text-center">Déjà membre? <a href="login.php">Connexion</a></p>
</div>
</FORM>
</div>


</main>




<?php
footer();
?> 




  