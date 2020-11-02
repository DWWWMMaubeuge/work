<?php

$candidat2update = "bubulle";

function executeSQL( $req )
{
	$adresse 		= "localhost";
	$utilisateur 	= "student";
	$password 		= "student";

	$connexion = new mysqli( $adresse, $utilisateur, $password );

	if ( $connexion->connect_error == true )
	 	echo "une erreur de connexion s'est produite<br>";

	echo "$req<br>";
	$resultat = $connexion->query( $req );

	$connexion->close();

	return $resultat;
}


$res = executeSQL( "select * from zoo.animaux WHERE nom='$candidat2update';"  );

$ligne = $res-> fetch_assoc();

$nom 	= $ligne[ 'nom' ];
$espece = $ligne[ 'espece' ];
$age 	= $ligne[ 'age' ];
$poid 	= $ligne[ 'poid' ];




if ( isset($_POST) && isset($_POST['nom']) && isset($_POST['espece']) && isset($_POST['age']) && isset($_POST['poid']) )
{
	$requete 	= "UPDATE zoo.animaux SET nom='".$_POST['nom']."', espece='".$_POST['espece']."', age=".$_POST['age'].", poid=".$_POST['poid']."  WHERE nom='$candidat2update' ;";

	executeSQL( $requete );
}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
	<input type="text"  	name="nom" 		value=<?=$nom?>		placeholder="nom de l'animal">
	<br>
	<input type="text"  	name="espece" 	value=<?=$espece?> placeholder="espece">
	<br>
	<input type="text"  	name="age" 		value=<?=$age?> placeholder="age">
	<br>
	<input type="text"  	name="poid" 	value=<?=$poid?> placeholder="poid">
	<br>
	<input type="submit"  	name="OK" 		value="OK">
</form>
