<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//inscriptFormateur.php?mail="+mail+"&idFormation="+ID_formation;
// [-0-9a-zA-Z_.+]+@[-0-9a-zA-Z.+]+.[a-zA-Z]{2,4}

 
if( $_POST['list_stagiaire2users'] != "" && $_POST['selRole'] != "" ) 
{
    $list_stagiaire = $_POST['list_stagiaire2users'];
    $role    		= $_POST['selRole'];


	$tabMails = [];
	$mails = str_replace( "\t", " ", $list_stagiaire);
	$lesligne = explode( "\n", $mails );
	foreach ($lesligne as $ligne) 
	{
		$lesMots = explode( " ", $ligne );
		foreach ($lesMots as $mail) 
		{
			if ( filter_var($mail, FILTER_VALIDATE_EMAIL)) 
			{	
			    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail'";
			    $result = executeSQL( $req );
			    $data = $result->fetch_assoc();
			    if ( $data[ 'nb' ] == 0 )
			    {
				    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password, id_session, id_formation) VALUES ( 'NC', 'NC', '$mail', 'NC', 0, 0 )";
				    executeSQL( $req );
				    $req = "INSERT INTO $DB_dbname.mail2inscript ( mail, role ) VALUES ( '$mail', '$role');";
				    $result = executeSQL( $req );
				}
				$req = "UPDATE $DB_dbname.users SET role='FOR' WHERE mail='$mail'";
				executeSQL( $req );
			}
		}
	}
	header( "location: admin.php");
}
?>