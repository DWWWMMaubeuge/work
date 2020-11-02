<?php


function executeSQL( $req, $message="insertion de données" )
{
	$adresse 		= "localhost";
	$utilisateur 	= "student";
	$password 		= "student";

	$connexion = new mysqli( $adresse, $utilisateur, $password );

	if ( $connexion->connect_error == true )
	 	echo "une erreur de connexion s'est produite<br>";

	echo "$message<br>";
	$connexion->query( $req );

	$connexion->close();
}


executeSQL( "DROP DATABASE IF EXISTS zoo;", "netoyage de la base de données" );
executeSQL( "CREATE DATABASE zoo;",  "creation de la base de données" );
executeSQL( "CREATE TABLE zoo.animaux (  nom VARCHAR( 255 ), espece  VARCHAR( 64 ), age INT, poid INT );", "creation de la table 'animaux'");
executeSQL( "INSERT INTO zoo.animaux ( nom, espece, age, poid ) VALUES ( 'titi'		, 'chat'	, 3		, 2  	); ");
executeSQL( "INSERT INTO zoo.animaux ( nom, espece, age, poid ) VALUES ( 'felix'	, 'chat'	, 13	, 20  	); ");
executeSQL( "INSERT INTO zoo.animaux ( nom, espece, age, poid ) VALUES ( 'bubulle'	, 'poisson'	, 12	, 178  	); ");
executeSQL( "INSERT INTO zoo.animaux ( nom, espece, age, poid ) VALUES ( 'flipper'	, 'poisson'	, 42	, 300  	); ");


?>