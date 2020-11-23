<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

<<<<<<< HEAD
//<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

/*<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>*/
=======
// ajouter des skills
// voir les resultats
// ajouter des stagiaires

>>>>>>> main

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
