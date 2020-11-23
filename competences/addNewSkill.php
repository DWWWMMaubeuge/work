<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//addNewFormation.php.php?nameFormation=maçonnerie
                                            
if( $_GET['data'] != "" ) 
{
    $data   = $_GET['data'];
	$req = "INSERT INTO $DB_dbname.skills ( name ) VALUES ( '$data' )";
	executeSQL( $req );
}
?>