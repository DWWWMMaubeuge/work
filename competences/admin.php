<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

session_start();

// verifier que le visteurs est bien passé par le login (donc il a un ID_user != 0)
// verifier que le visteurs est bien administrateur (donc il a un role ==   ADM )
if ( !isset( $_SESSION[ 'ID_user' ]) || $_SESSION[ 'ID_user' ] == 0 || $_SESSION[ 'role' ] != 'ADM')
    header( "location: login.php");

// recupération des formations pour le comboBox

$req = "SELECT * FROM $DB_dbname.formations";
$res = executeSQL( $req );
$widget_formation = "<option value=\"0\">select formation</option>\n";
while( $ligne = $res->fetch_assoc())
    $widget_formation .="<option value=\"".$ligne['id']."\">".$ligne['name']."</option>\n";

// recupération des sessions pour le comboBox
$req = "SELECT * FROM $DB_dbname.sessions";
$res = executeSQL( $req );
$widget_session = "<option value=\"0\">select session</option>\n";
while( $ligne = $res->fetch_assoc())
{
    $nom = $ligne['name']. "   ".$ligne['date_begin']. "->".$ligne['date_end']; 
    $widget_session .="<option value=\"".$ligne['id']."\">$nom</option>\n";
}



if( $_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['password'] != "" ) 
{
    $name       = $_POST['name'];
    $surname    = $_POST['surname'];
    $mail       = $_POST['mail'];
    $password   = $_POST['password'];

    // attention aux doublons des mails

    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL( $req );
    header( "location: accueil02_multiple.php");
}

?>
<script>
function inscritFormateur2Formation()
{
  var xhttp = new XMLHttpRequest();

  mail          = document.getElementById( 'for_mail' ).value;
  ID_formation  = document.getElementById( 'for_mail_sel' ).value;

  if ( mail.length > 5 && ID_formation > 0 )
  {
      let url = "inscritFormateur2FormationGET.php?mail="+mail+"&idFormation="+ID_formation;
      xhttp.open("GET", url, true); 
      xhttp.send();
  }
 }

function inscritFormateur2Session()
{
  var xhttp = new XMLHttpRequest();

  mail        = document.getElementById( 'for_mail_f2s' ).value;
  ID_session  = document.getElementById( 'session_sel_f2s' ).value;
  
  if ( mail.length > 5 && ID_session > 0 )
  {
      let url = "inscritFormateur2SessionGET.php?mail="+mail+"&idSession="+ID_session;
      xhttp.open("GET", url, true); 
      xhttp.send();
  }
}

function inscritSession()
{
  var xhttp = new XMLHttpRequest();

  name          = document.getElementById( 'session_name' ).value;
  date_begin    = document.getElementById( 'session_date_b' ).value;
  date_end      = document.getElementById( 'session_date_e' ).value;
  ID_formation  = document.getElementById( 'for_formation_sel' ).value;
  
  if ( name.length > 10 && ID_formation > 0 && date_begin.length > 5 && date_end.length > 5 )
  {
    let url = "inscritFormationGET.php?name="+name+"&idFormation="+ID_formation+"&dateb="+date_begin+"&datee="+date_end;
    
    //console.log( url );
    xhttp.open("GET", url, true); 
    xhttp.send();
  }   
}

function afficheListeStagiaireSession( id_session )
{
  var objectXHTTP = new XMLHttpRequest();
  objectXHTTP.open("GET", "getListStagiaireSessionGET.php?idSession="+id_session, true);
  objectXHTTP.send();

  objectXHTTP.onreadystatechange = function() 
  {
    if ( this.readyState == 4 && this.status == 200 ) 
      document.getElementById("resLSS").innerHTML = this.responseText;
  };
}
       
function afficheListeSession( )
{
  var objectXHTTP = new XMLHttpRequest();

  objectXHTTP.open("GET", "getListSessionGET.php", true);
  objectXHTTP.send();

  objectXHTTP.onreadystatechange = function() 
  {
    if ( this.readyState == 4 && this.status == 200 ) 
      document.getElementById("resLS").innerHTML = this.responseText;
  };                       
}

function afficheListeSessionByFormation( id_formation )
{
  var objectXHTTP = new XMLHttpRequest();

  objectXHTTP.open("GET", "getListSessionFormationGET.php?idFormation="+id_formation, true);
  objectXHTTP.send();

  objectXHTTP.onreadystatechange = function() 
  {
    if ( this.readyState == 4 && this.status == 200 ) 
      document.getElementById("resLSF").innerHTML = this.responseText;
  };                       
}

function afficheListeFormateurByFormation( id_formation )
{
  var objectXHTTP = new XMLHttpRequest();

  objectXHTTP.open("GET", "getListFormateurFormationGET.php?idFormation="+id_formation, true);
  objectXHTTP.send();

  objectXHTTP.onreadystatechange = function() 
  {
    if ( this.readyState == 4 && this.status == 200 ) 
      document.getElementById("resLSFF").innerHTML = this.responseText;
  };                       
}

function inscritFormation( nomFormation )
{
  var objectXHTTP = new XMLHttpRequest();

  let url = "inscritFormationGET.php?name="+nomFormation;
  console.log( "appel URL ", url )

  objectXHTTP.open("GET", url, true);
  objectXHTTP.send();
}

</script>
<h1> page d'admin</h1>
<br>
Ajouter un formateur
<br>
<FORM  method='POST' action="#">
<INPUT type='text' id='for_mail' name='for_mail' placeholder="mail du formateur" onchange="inscritFormateur2Formation()">
<br>
<select id='for_mail_sel' name="selFormation" onchange="inscritFormateur2Formation()" >
<?=$widget_formation?>
</select>

<br>
<br>
<br>
Ajouter une session de formation
<br>
<INPUT type='text' name='session_name' id='session_name' placeholder="nom de la formation (10car min)" onchange="inscritSession()">
<br>
<select id='for_formation_sel' name="selFormation2" onchange="inscritSession()" >
<?=$widget_formation?>
</select>
<br>
date début : 
<INPUT type='date' name='session_date_begin' id='session_date_b' onchange="inscritSession()">
<br>
date fin :
<INPUT type='date' name='session_date_end' id='session_date_e' onchange="inscritSession()">


<br>
<br>
<br>
Inscrire un formateur à session 
<br>
<INPUT type='text' id='for_mail_f2s' name='for_mail' placeholder="mail du formateur" onchange="inscritFormateur2Session()">
<br>
<select id='session_sel_f2s' name="selSession" onchange="inscritFormateur2Session()">
<?=$widget_session?>
</select>

</FORM>


<br>
<br>
<br>
Ajouter des acteurs
<br>
<FORM  method='POST' action="inscriptActeursPOST.php">
<textarea  name="list_stagiaire2users" id="list_stagiaire2users" rows="10" cols="50">
</textarea>
<br>
<select id='role_sel' name="selRole">
<option value=''>choisir role</option>
<option value='STA'>stagiaire</option>
<option value='FOR'>formateur</option>
<option value='ADM'>administrateur</option>
</select>
<br>
<INPUT type='submit' value='INSCRIPTION'>
</FORM>
<br>
<br>
<br>
inscrire des acteurs à une session de formation
<br>
<FORM  method='POST' action="inscriptStagiaire2SessionPOST.php">
<textarea  name="list_stagiaire2session" id="list_stagiaire2session" rows="10" cols="50">
</textarea>
<br>
<select id='session_sel' name="selSession" >
<?=$widget_session?>  
</select>
<br>
<INPUT type='submit' value='INSCRIPTION'>
</FORM>

<br>
<br>
<br>
<div>
liste des stagiares de : <br>
<select id='session_sel_list_sta' name="selSession" onchange="afficheListeStagiaireSession( this.value )">
<?=$widget_session?>
</select>  
<div id="resLSS">
</div>
</div>


<br>
<br>
<br>
<div>
liste des sessions : <br>
<input type="button" id='session_sel_list' name="selSession" value="list sessions" onclick="afficheListeSession()">
<div id="resLS">
</div>
</div>

<br>
<br>
<br>
<div>
liste des sessions par formation : <br>
<select id='session_sel_list_ses_for' name="selSession" onchange="afficheListeSessionByFormation( this.value )">
<?=$widget_formation?>
</select>  
<div id="resLSF">
</div>
</div>

<br>
<br>
<br>
<div>
liste des formateur par formation : <br>
<select id='session_sel_list_for_for' name="selSession" onchange="afficheListeFormateurByFormation( this.value )">
<?=$widget_formation?>
</select>  
<div id="resLSFF">
</div>
</div>


<br>
<br>
<br>
Ajouter une formation
<br>
<FORM  method='POST' action="#">
<INPUT type='text' id='add_formation' name='add_formation' placeholder="nom de la formation" onchange="inscritFormation( this.value )">
<br>
<br>