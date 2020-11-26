<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//addNewSkill.php.php?data=maçonnerie&idFormation=1
                                            
if( $_GET['nameSkill'] != "" ) 
{
    $data   = $_GET['name_skill'];
	$req = "INSERT INTO $DB_dbname.skills ( name ) VALUES ( '$data' )";
	executeSQL( $req );
}
?>