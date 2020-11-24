<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );


// recupération des formations pour le comboBox
$req = "SELECT * FROM $DB_dbname.mail2inscript";
$res = executeSQL( $req );

while( $ligne = $res->fetch_assoc())
{
	$ID_session 	= 0;
	$ID_formation 	= 0;

	$mail 			= $ligne[ "mail" ];
	
	if ( isset( $ligne[ "id_session" ] ) )
		$ID_session 	= $ligne[ "id_session" ];

	if ( isset( $ligne[ "id_formation" ] ) )
		$ID_formation 	= $ligne[ "id_formation" ];

	$role 			= $ligne[ "role" ];

	echo "$mail<br>";


    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
    if ( $data[ 'nb' ] == 0 )
    {
	    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password, id_session, id_formation ) VALUES ( 'NC', 'NC', '$mail', 'NC', $ID_session, $ID_formation )";
	    executeSQL( $req );
	    echo "----inscrite<br>";

	}
	else
		echo "----doublon<br>";

}
?>