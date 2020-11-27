<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//inscriptFormateur2SessionPOST.php?mail="+mail+"&idSession="+ID_session;
                                            
if( 
	isset( $_GET['mail']		) && 
	isset( $_GET['idFormation']	) &&
	( $_GET['mail'] != "" 		) && 
	( $_GET['idFormation'] >0   ) 
{

    $mail 			= $_GET['mail'];
    $ID_formation   = $_GET['idFormation'];

	$ID_NewUser = addUser( $mail, 'FOR');

	$req = "UPDATE $DB_dbname.users SET id_formation=$ID_formation WHERE mail='$mail'";
	executeSQL( $req );
}
?>