<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

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

echo "<h3>bonjour $surname_user</h3>\n";

// recupère le nom de la formation
$req = "SELECT * FROM $DB_dbname.formations where id=$ID_formation";
$result = executeSQL( $req );
$data = $result->fetch_assoc();
$formationName = $data[ 'name'];
echo "<h3>formation : $formationName</h3>\n";

// XXXXX
$ID_session   = $_SESSION[ 'ID_formation' ];
$name_session      = $_SESSION[ 'name' ];

// recupère le nom de la session si il en a une
$req = "SELECT * FROM $DB_dbname.sessions where id=$ID_formation";
//$data = $result->fetch_assoc();
//$sessionsName = $data[ 'name'];
//echo "<h3>session : $sessionsName</h3>\n";


// XXXXX

$name_user      = $_SESSION[ 'name' ];
$surname_user   = $_SESSION[ 'surname' ];
$password_user  = $_SESSION[ 'password' ];
$mail_user      = $_SESSION[ 'mail' ];
$ID_formation   = $_SESSION[ 'ID_formation' ];
$ID_session     = $_SESSION[ 'ID_session' ];
$role_user      = $_SESSION[ 'role'];

// recupère la liste des stagiaires
/*
$req = "SELECT * FROM $DB_dbname.users ............";
$res = executeSQL( $req );
$list_stagiaires = "<ul name=\"listStagiare\" >\n";
while( $ligne = $res->fetch_assoc() )
{
  array_push( $users, [ $ligne['id'], $ligne[ 'name'], $ligne[ 'surname'], $ligne[ 'password'],$ligne[ 'mail'}  $ligne[ 'id_formation'],$ligne[ 'id_session'], $ligne[ 'role']  ] );
	//print_r( $ligne );
	$list_stagiaires .="<li>".$ligne['name']."</li>\n";
}
$list_stagiaires .= "</ul>\n";
*/


?>

<script>

// fonction AJAX qui appelle une page PHP pour mettre des données dans la DBrecupérer
// les données sont transmise en mode GET
function addNewSkill( data )
{
  var objectXHTTP = new XMLHttpRequest();

  let url = "addNewSkill.php?data="+data+"&idFormation=<?= $ID_formation?>";
  console.log( "appel URL ", url )

  objectXHTTP.open("GET", url, true);
  objectXHTTP.send();
}

</script>
<br>
<br>
<br>
Ajouter un skill
<br>
<FORM  method='POST' action="#">
<INPUT type='text' id='new_skil' name='new_skill' placeholder="nom du skill" onchange="addNewSkill( this.value )">
<br>
