<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );
include "MyLibrary.php";
entete();
logo();
nav(0);

// ajouter des skills
// voir les resultats
// ajouter des stagiaires


session_start();

//if ( ! isset( $_SESSION[ 'ID_user' ] ))
//    header( "location: login01.php")

$ID_formation   = $_SESSION[ 'ID_formation' ];
$ID_user        = $_SESSION[ 'ID_user' ];
$name_user      = $_SESSION[ 'name' ];
$surname_user   = $_SESSION[ 'surname' ];


// recupère le nom de la formation
$req = "SELECT * FROM $DB_dbname.formations where id=$ID_formation";
$result = executeSQL( $req );
$data = $result->fetch_assoc();
$formationName = $data[ 'name'];
echo "<h3>formation : $formationName</h3>\n";

// XXXXX
// recupère le nom de la session si il en a une
$req = "SELECT * FROM $DB_dbname.sessions .......... ";
//$result = executeSQL( $req );
//$data = $result->fetch_assoc();
//$sessionsName = $data[ 'name'];
//echo "<h3>session : $sessionsName</h3>\n";


// XXXXX
// recupère la liste des stagiaires
/*
$req = "SELECT * FROM $DB_dbname.users ............";
$res = executeSQL( $req );
$list_stagiaires = "<ul name=\"listStagiare\" >\n";
while( $ligne = $res->fetch_assoc() )
{
	//print_r( $ligne );
	$list_stagiaires .="<li>".$ligne['name']."</li>\n";
}
$list_stagiaires .= "</ul>\n";
*/


?>

<script>

// fonction AJAX qui appelle une page PHP pour mettre des données dans la DBrecupérer
// les données sont transmise en mode GET
function inscritSkill( name )
{
  var objectXHTTP = new XMLHttpRequest();

  let url = "inscritSkillGET.php?name="+name+"&idFormation=<?= $ID_formation?>";
  console.log( "appel URL ", url )

  objectXHTTP.open("GET", url, true);
  objectXHTTP.send();
}

<?php
	
    if(isset($_POST['formMail']))
    {
        if(!empty($_POST['name']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
        {
            $header = "MIME-Version: 1.0\r\n";
            $header .= 'From:"fla42nato@gmail.com"<contact@fla.com>' . "\n";
            $header .= 'Content-Type:text/html; charset="utf-8"' . "\n";
            $header .= 'Content-Transfer-Encoding: 8bit';
    
            $message = '
                <html>
                    <body>
                        <div align="center">
                            <p> Nom de l\'expédiyeur :' . $_POST['name'] . '</p>
                            <p> Mail de l\'expédiyeur :' . $_POST['mail'] . '</p>
                            <p>' . nl2br($_POST['message']). '</p>
                        </div>
                    </body>
                </html>
            ';
    
        mail("fla42nato@gmail.com", "Contact - monsite.com", $message, $header);
    
        $msg = "Votre message a bien été envoyé !";
    
        }
        else
        {
            $msg = "Tous les champs doivent être complétés !";
        }
    
        
    }
    ?>

        
    }
</script>




<h2 class="page-heading">Compétences</h2>
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
  <?php echo "<h3>Bonjour $surname_user</h3>\n";?>
    <h4>Ajoute une compétence</h4>
    <p>
    <FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <INPUT type='text' id='new_skil' name='new_skill' placeholder="nom de la compétence" onchange="inscritSkill( this.value )">
<br>	<h2> Formulaire de contact ! </h2>
	<form method="POST" action="">
	<input type="text" name="name" placeholder="Votre nom" value="<?php if(isset($_POST['name'])) { echo $_POST['name']; } ?>" /> <br/> <br/>
	<input type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>"/> <br/> <br/>
	<textarea name="message" placeholder="Votre Message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea> <br/> <br/>
  <input type="submit" value="Envoyer !" name="formMail" />
  <?php $msg = "Votre message a bien été envoyé !";?>
  <?php $msg = "Tous les champs doivent être complétés !";?>
	</form> <br/> <br/>

</div>


</main>




<?php
footer();
?> 
