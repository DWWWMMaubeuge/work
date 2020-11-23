<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//addNewFormation.php.php?nameFormation=maçonnerie
                                            
if( $_GET['nameFormation'] != "" ) 
{
    $nameFormation   = $_GET['nameFormation'];
	$req = "INSERT INTO $DB_dbname.formations ( name ) VALUES ( '$nameFormation' )";
	executeSQL( $req );
}
?>
