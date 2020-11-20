<?php
require_once "parametres.php";
include_once "CO_global_functions.php";

$req = "SELECT * FROM $DB_dbname.formations";
$res = executeSQL($req);

$widget_formation = "<select name=\"selFormation\" >\n";
while ($ligne = $res->fetch_assoc()) {
    $widget_formation .= "<option value=\"" . $ligne['id'] . "\">" . $ligne['name'] . "</option>\n";
}

$widget_formation .= "</select>\n";

if ($_POST && isset($_POST['name']) && $_POST['surname'] != "" && $_POST['mail'] != "" && $_POST['password'] != "") {
    $name     = $_POST['name'];
    $surname  = $_POST['surname'];
    $mail     = $_POST['mail'];
    $password = $_POST['password'];

    // attention aux doublons des mail

    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( '$name', '$surname', '$mail', '$password' )";
    executeSQL($req);
    header("location: accueil02_multiple.php");
}

?>
<FORM  method='POST' action="<?php echo $_SERVER['PHP_SELF']; ?>">
Ajouter un formateur
<br>
<INPUT type='text' name='for_mail' placeholder="mail du formateur">
<br>
<?=$widget_formation?>
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