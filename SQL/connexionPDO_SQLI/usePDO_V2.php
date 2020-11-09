<?php
include( "paramConnectPDO.php" );


//$query = "INSERT INTO $DB_dbname.skills (name) VALUES ( 'Agile' );";

$skill = "Test";

$requete = $connexion->prepare( "INSERT INTO $DB_dbname.skills (name) VALUES ( :nom ) ");
$requete->bindParam(':nom', $skill, PDO::PARAM_STR); 
$requete->execute();

$connexion = null;
?>