<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

session_start();
$ID_formation   = $_SESSION[ 'id_formation' ];
$ID_user        = $_SESSION[ 'ID_user' ];
$name_user      = $_SESSION[ 'name' ];
$surname_user   = $_SESSION[ 'surname' ];

echo "<h3>bonjour $surname_user</h3>\n";

$req = "SELECT * FROM $DB_dbname.formations where id=$ID_formation";
$result = executeSQL( $req );
$data = $result->fetch_assoc();
$Formation_name = $data[ 'name'];

echo "<h3>formation : $Formation_name</h3>\n";



$req = "SELECT * FROM $DB_dbname.users WHERE id_formation=$ID_formation AND role='STA' ";
$res = executeSQL( $req );

//print_r( $res );

$list_stagiaires = "<ul name=\"listStagiare\" >\n";
while( $ligne = $res->fetch_assoc() )
{
	//print_r( $ligne );
	$list_stagiaires .="<li>".$ligne['name']."</li>\n";
}
$list_stagiaires .= "</ul>\n";




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
Ajouter une compétence
<br>
<INPUT type='text' name='skill' placeholder="nouvelle compétence">
<br>
<INPUT type='submit' value='OK'>
<br>
<br>
<INPUT type='button' value='VOIR COMPETENCE'>
</FORM>
<br><br>
<?=$list_stagiaires?>
