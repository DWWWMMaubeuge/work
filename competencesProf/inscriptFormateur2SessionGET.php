<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//inscriptFormateur2SessionPOST.php?mail="+mail+"&idSession="+ID_session;
                                            
if( $_GET['mail'] != "" && $_GET['idSession'] != "" ) 
{
    $mail 			= $_GET['mail'];
    $ID_session    	= $_GET['idSession'];

	
    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 0 )
    {
	    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password ) VALUES ( 'NC', 'NC', '$mail', 'NC' )";
	    executeSQL( $req );
	    $req = "INSERT INTO $DB_dbname.mail2inscript ( mail, id_session, role ) VALUES ( '$mail', $ID_session, 'FOR' );";
	    $result = executeSQL( $req );
	}
	$req = "UPDATE $DB_dbname.users SET id_session=$ID_session, role='FOR' WHERE mail='$mail'";
	executeSQL( $req );
}
?>
