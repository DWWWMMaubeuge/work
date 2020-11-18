<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

//inscriptFormateur.php?mail="+mail+"&idFormation="+ID_formation;

if( $_GET['name'] != "" && $_GET['idFormation'] != "" ) 
{
    $name        	= $_GET['name'];
    $idFormation    = $_GET['idFormation'];
  
    $req = "INSERT INTO $DB_dbname.sessions ( name, id_formation ) VALUES ( '".$name."', ".$idFormation." );";
    $result = executeSQL( $req );
}
?>
