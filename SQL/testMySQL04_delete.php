<?php

if ( isset($_POST) && isset($_POST['nom'])  )
{
	$adresse 		= "localhost";
	$utilisateur 	= "student";
	$password 		= "student";

	$connexion = new mysqli( $adresse, $utilisateur, $password );

	if ( $connexion->connect_error == true )
	 	echo "une erreur de connexion s'est produite<br>";
	else
	 	echo "connexion réussie<br>";

	$requete 	= "DELETE  FROM zoo.animaux WHERE nom='".$_POST['nom']."';";


	echo "$requete<br>";

	$connexion->query( $requete );

	$connexion->close();
}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	<input type="text"  	name="nom" 		placeholder="nom de l'animal">
	<br>
	<input type="submit"  	name="OK" 		value="OK">
</form>
