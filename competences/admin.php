<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

$req = "SELECT * FROM $DB_dbname.formations";
$res = executeSQL( $req );

$widget_formation = "<select name=\"selFormation\" >\n";
while( $ligne = $res->fetch_assoc())
	$widget_formation .="<option value=\"".$ligne['id']."\">".$ligne['name']."</option>\n";
$widget_formation .= "</select>\n";


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
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
Ajouter un formateur
<br>
<INPUT type='text' name='for_mail' placeholder="mail du formateur">
<br>
<?=$widget_formation ?>
<br>
<br>

Ajouter une formation
<br>
<INPUT type='text' name='mat_name' placeholder="nom de la formation">
<br>
<br>

Ajouter des stagiaires
<br>
<textarea id="list_stagiaire" name="list_stagiaire"
          rows="10" cols="50">
</textarea>
<br>
<br>
<INPUT type='text' name='for_form_stagiare' placeholder="formation">
<br>
<br>

<INPUT type='submit' value='OK'>
</FORM>