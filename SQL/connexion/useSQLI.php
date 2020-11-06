<?php

include( "paramConnectSQLI.php" );


$query = "INSERT INTO $DB_dbname.skills (name) VALUES ( 'Doctrine' );";

$connexion->query( $query );

$connexion->close();


?>