<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );
//inscriptFormateur2SessionPOST.php?mail="+mail+"&idSession="+ID_session;
//inscriptFormateur.php?mail="+mail+"&idFormation="+ID_formation;
// [-0-9a-zA-Z_.+]+@[-0-9a-zA-Z.+]+.[a-zA-Z]{2,4}

                                            
if( $_POST['list_stagiaire2session'] != "" && $_POST['selSession'] != "" ) 
{
    $list_stagiaire = $_POST['list_stagiaire2session'];
    $ID_session    	= $_POST['selSession'];


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
				    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( 'NC', 'NC', '$mail', 'NC')";
				    executeSQL( $req );
				    $req = "INSERT INTO $DB_dbname.mail2inscript ( mail, id_session ) VALUES ( '$mail', $ID_session, 'STA' );";
				    $result = executeSQL( $req );
				}
			    $req = "SELECT id FROM $DB_dbname.users WHERE mail='$mail'";
			    $result = executeSQL( $req );
			    $data = $result->fetch_assoc();
			    $id = $data[ 'id' ];

				$req = "UPDATE $DB_dbname.users SET id_session=$ID_session, role='STA' WHERE mail='$mail'";
				executeSQL( $req );
				$req = "INSERT INTO $DB_dbname.user_session ( id_user, id_session ) VALUES ( $id, $ID_session )";
				executeSQL( $req );
			}
		}
	}
	header( "location: admin.php");
}
?>