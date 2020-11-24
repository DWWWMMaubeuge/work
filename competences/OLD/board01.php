<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );


session_start();
$ID_user = $_SESSION[ 'ID_user' ];
$name_user = $_SESSION[ 'name' ];
$surname_user = $_SESSION[ 'surname' ];

echo "<h3>bonjour $surname_user</h3>\n";



<<<<<<< HEAD
//$req = "SELECT * FROM xavier.skills";
=======
$req = "SELECT * FROM $DB_dbname.skills";
>>>>>>> main
$result = executeSQL( $req );

$skills = [];
while( $data = $result->fetch_assoc())
{
    array_push( $skills, [ $data['id'], $data[ 'name']   ] );
}



?>
