<?php
	
// param de connexion BDD
$DB_dbname		= "DWWM_Maubeuge";

$adresse 		= "mysql:host=localhost;dbname=$DB_dbname";
$utilisateur 	= "student";
$password 		= "student";

$DB_dbname		= "DWWM_Maubeuge";

try 
{
	$connexion = new PDO( $adresse, $utilisateur, $password );
}
catch( PDOException $Exception ) 
{
    echo "une erreur de connexion s'est produite : ".$Exception->getMessage( );
}


function executeSQL( $req )
{
	GLOBAL $connexion;
	echo "$req<br>";
	return $connexion->query( $req );
}





?>