<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//inscritSkill.php?name=maçonnerie&idFormation=1
                                            
if( 	isset( $_GET['name'] 		) 	&&
		isset( $_GET['idFormation'] ) 	&&
		( $_GET['name'] != "" 		)	&& 
		( $_GET['idFormation'] > 0 	)
) 	
{
    $name   		= $_GET['name'];
    $ID_formation   = $_GET['idFormation'];
	$req = "INSERT INTO $DB_dbname.skills ( name, id_formation ) VALUES ( '$name', $ID_formation )";
	executeSQL( $req );
}
?>