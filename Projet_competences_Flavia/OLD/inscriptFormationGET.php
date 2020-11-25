<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

if (
	isset( $_GET['name']				) && 
	isset( $_GET['idFormation']			) &&
	isset( $_GET['dateb']				) && 
	isset( $_GET['datee']				) && 
	( $_GET['name'] != "" 				) &&
	( $_GET['dateb'] < $_GET['datee']	) && 
	( $_GET['idFormation'] >0   		)
	) 
{
    $name        	= $_GET['name'];
    $ID_formation   = $_GET['idFormation'];
    $dateb    		= $_GET['dateb'];
    $datee    		= $_GET['datee'];
  
    $req = "INSERT INTO $DB_dbname.sessions ( name, id_formation, date_begin, date_end ) VALUES ( '".$name."', ".$ID_formation.", '".$dateb."', '".$datee."'  );";
    $result = executeSQL( $req );
}
?>
