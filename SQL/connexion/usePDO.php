<?php
include( "paramConnectPDO.php" );


//$query = "INSERT INTO $DB_dbname.skills (name) VALUES ( 'Agile' );";

//$connexion->query( $query );

$query = "INSERT INTO $DB_dbname.skills (name) VALUES ( 'GIT' );";

executeSQL( $query );


$connexion = null;
?>