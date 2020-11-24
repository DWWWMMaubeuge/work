<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

// [-0-9a-zA-Z_.+]+@[-0-9a-zA-Z.+]+.[a-zA-Z]{2,4}


 
if( $_POST['list_stagiaire2users'] != "" && in_array( $_POST['selRole'], [ 'STA', 'FOR', 'ADM'] ) ) 
{
    $list_stagiaire = $_POST['list_stagiaire2users'];
    $role    		= $_POST['selRole'];

	$mails = parseMailIntoText( $list_stagiaire );
	foreach ($mails as $mail) 
		addUser( $mail, $role);
	header( "location: admin.php");
}
?>