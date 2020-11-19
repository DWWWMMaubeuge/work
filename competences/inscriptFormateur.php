<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//inscriptFormateur.php?mail="+mail+"&idFormation="+ID_formation;

if( $_GET['mail'] != "" && $_GET['idFormation'] != "" ) 
{
    $mail        	= $_GET['mail'];
    $idFormation    = $_GET['idFormation'];
  
    $req = "INSERT INTO $DB_dbname.mail2inscript ( mail, id_formation ) VALUES ( '".$mail."', ".$idFormation." );";
    $result = executeSQL( $req );
}
?>
