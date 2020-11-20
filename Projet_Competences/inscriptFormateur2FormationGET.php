<?php
require_once( "Connect.php" );
include_once(  "Serveur.php"  );

//inscriptFormateur2SessionPOST.php?mail="+mail+"&idSession="+ID_formation;
                                            
if( $_GET['mail'] != "" && $_GET['idFormation'] != "" ) 
{
    $mail 			= $_GET['mail'];
    $ID_formation   = $_GET['idFormation'];

	
    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 0 )
    {
	    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password, id_formation, type ) VALUES ( 'NC', 'NC', '$mail', 'NC', $ID_formation, 'formateur' )";
	    executeSQL( $req );
	    $req = "INSERT INTO $DB_dbname.mail2inscript ( mail, id_formation, type ) VALUES ( '$mail', $ID_formation, 'formateur' );";
	    $result = executeSQL( $req );
	}
	$req = "UPDATE $DB_dbname.users SET id_formation=$ID_formation, type='formateur' WHERE mail='$mail'";
	executeSQL( $req );
}
?>

