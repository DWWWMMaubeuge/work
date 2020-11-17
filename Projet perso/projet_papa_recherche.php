<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
    <link rel="stylesheet" href= "projet_papaCSS.css">
</head>
<body>
    <h1 >Page de recherche</h1>
    
    
    
</body>
</html>
<?php

if ( isset($_POST) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['email']) && isset($_POST['password']))
{
	$adresse 		= "localhost";
	$utilisateur 	= "root";
	$password 		= "";

	$connexion = new mysqli( $adresse, $utilisateur, $password );

	if ( $connexion->connect_error == true )
	 	echo "une erreur de connexion s'est produite<br>";
	else
	 	echo "connexion réussie<br>";

	$requete 	= "select projet.users (nom, prenom, age, email, password ) values ( '".$_POST['nom']."', '".$_POST['prenom']."', ".$_POST['age'].", '".$_POST['email']."', '".$_POST['password']."');";


	//echo "$requete<br>";

	$connexion->query( $requete );

	$connexion->close();
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
     
     <h2>Nom</h2>
     <input type="text"  	name="nom" 		placeholder="nom ">
<br>
  <h2>Prénom</h2>
  <input type="text"  	name="prenom" 	placeholder="prenom">
<br>
  <h2>Age</h2>
  <input type="number"  	name="age" 		placeholder="age">
<br>
  <h2>E-Mail</h2>
  <input type="text"  	name="email" 	placeholder="email">
<br>
  <h2>Mot De Passe</h2>
  <input type="text"  	name="password" 	placeholder="password">
<br>
<input type="submit"  	name="OK" 		value="OK">
</form>

	
	
  