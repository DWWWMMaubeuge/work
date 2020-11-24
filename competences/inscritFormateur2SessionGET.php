<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//inscriptFormateur2SessionPOST.php?mail="+mail+"&idSession="+ID_session;
if( 
	isset( $_GET['mail']		) && 
	isset( $_GET['idSession']	) &&
	( $_GET['mail'] != "" 		) && 
	( $_GET['idSession'] >0   ) 
{
    $mail 			= $_GET['mail'];
    $ID_session   = $_GET['idSession'];

	$ID_NewUser = addUser( $mail, 'FOR');

	$req = "UPDATE $DB_dbname.users SET id_session=$ID_session WHERE mail='$mail'";
	executeSQL( $req );             
}
?>

