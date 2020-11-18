<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

session_start();

// verifier que le visteurs est bien passé par le login (donc il a un ID_user != 0)
// verifier que le visteurs est bien administrateur (donc il a un role ==   ADM )
if ( !isset( $_SESSION[ 'ID_user' ]) || $_SESSION[ 'ID_user' ] == 0 || $_SESSION[ 'role' ] != 'ADM')
    header( "location: login01.php");


$req = "SELECT * FROM $DB_dbname.formations";
$res = executeSQL( $req );

$widget_formation = "";
while( $ligne = $res->fetch_assoc())
	$widget_formation .="<option value=\"".$ligne['id']."\">".$ligne['name']."</option>\n";


if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mail

    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL( $req );
    header( "location: accueil02_multiple.php");
}

?>
<script>
function inscritFormateur()
{
    {
      var xhttp = new XMLHttpRequest();
      // maj_value.php?idUser=4&idSkill=4&valueSkill=5
      mail = document.getElementById( 'for_mail' ).value;
      if ( mail.length > 5 )
      {
          ID_formation = document.getElementById( 'for_mail_sel' ).value;

          let url = "inscriptFormateur.php?mail="+mail+"&idFormation="+ID_formation;
          xhttp.open("GET", url, true); 
          xhttp.send();
      }
    }   
}

function inscritFormation()
{
    {
      var xhttp = new XMLHttpRequest();
      // maj_value.php?idUser=4&idSkill=4&valueSkill=5
      name = document.getElementById( 'session_name' ).value;
      if ( name.length > 5 )
      {
          ID_formation = document.getElementById( 'for_formation_sel' ).value;
            //inscriptFormation.php?name=miammiam&idFormation=2
          let url = "inscriptFormation.php?name="+name+"&idFormation="+ID_formation;
          console.log( url );
          xhttp.open("GET", url, true); 
          xhttp.send();
      }
    }   
}

</script>
Ajouter un formateur
<br>
<FORM  method='POST' action="#">
<INPUT type='text' id='for_mail' name='for_mail' placeholder="mail du formateur" onchange="inscritFormateur()">
<br>
<select id='for_mail_sel' name="selFormation" onchange="inscritFormateur()" >
<?=$widget_formation?>
</select>
<br>
<br>
<br>

Ajouter une session de formation
<br>
<INPUT type='text' name='session_name' id='session_name' placeholder="nom de la formation" onchange="inscritFormation()">
<br>
<select id='for_formation_sel' name="selFormation2" onchange="inscritFormation()" >
<?=$widget_formation?>
</select>
<br>
<br>
<br>
</FORM>
<FORM  method='POST' action="inscriptStagiaire.php">
Ajouter des stagiaires
<br>
<textarea  name="list_stagiaire" rows="10" cols="50">
</textarea>
<br>
<br>
<INPUT type='text' name='for_form_stagiaire' placeholder="formation">
<br>
<br>

<INPUT type='submit' value='OK'>
</FORM>