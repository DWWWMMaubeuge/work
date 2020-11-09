<?php
	
	// param de connexion BDD
	$adresse 		= "localhost";
	$utilisateur 	= "student";
	$password 		= "student";

	$DB_dbname		= "DWWM_Maubeuge";


	$connexion = new mysqli( $adresse, $utilisateur, $password );

	if ( $connexion->connect_error == true )
	 	echo "une erreur de connexion s'est produite<br>";

?>