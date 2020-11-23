<?php
require_once( "Connect.php" );
include_once(  "Serveur.php"  );

//inscriptFormateur.php?mail="+mail+"&idFormation="+ID_formation;

if( $_GET['name'] != "" && $_GET['idFormation'] != "" ) 
{
    $name        	= $_GET['name'];
    $ID_formation    = $_GET['idFormation'];
    $dateb    		= $_GET['dateb'];
    $datee    		= $_GET['datee'];
  
    $req = "INSERT INTO $DB_dbname.sessions ( name, id_formation, date_begin, date_end ) VALUES ( '".$name."', ".$ID_formation.", '".$dateb."', '".$datee."'  );";
    $result = executeSQL( $req );
}
?>
