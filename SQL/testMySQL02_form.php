<?php

if ( isset($_POST) && isset($_POST['nom']) && isset($_POST['espece']) && isset($_POST['age']) && isset($_POST['poid']) )
{
	$adresse 		= "localhost";
	$utilisateur 	= "student";
	$password 		= "student";

	$connexion = new mysqli( $adresse, $utilisateur, $password );

	if ( $connexion->connect_error == true )
	 	echo "une erreur de connexion s'est produite<br>";
	else
	 	echo "connexion réussie<br>";

	$requete 	= "insert into zoo.animaux (nom, espece, age, poid ) values ( '".$_POST['nom']."', '".$_POST['espece']."', ".$_POST['age'].", ".$_POST['poid']."    );";


	//echo "$requete<br>";

	$connexion->query( $requete );

	$connexion->close();
}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	<input type="text"  	name="nom" 		placeholder="nom de l'animal">
	<br>
	<input type="text"  	name="espece" 	placeholder="espece">
	<br>
	<input type="text"  	name="age" 		placeholder="age">
	<br>
	<input type="text"  	name="poid" 	placeholder="poid">
	<br>
	<input type="submit"  	name="OK" 		value="OK">
</form>
