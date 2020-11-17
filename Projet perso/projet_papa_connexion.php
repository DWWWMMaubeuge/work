<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href= "projet_papaCSS.css">
</head>
<body>
    <h1 >Connexion</h1>
    
    
    
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

	$requete 	= "select into projet.users (nom, prenom, age, email, password ) values ( '".$_POST['nom']."', '".$_POST['prenom']."', ".$_POST['age'].", '".$_POST['email']."', '".$_POST['password']."');";


	//echo "$requete<br>";

	$connexion->query( $requete );

	$connexion->close();
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
     
 
  <h2>E-Mail</h2>
  <input type="text"  	name="email" 	placeholder="email">
<br>
  <h2>Mot De Passe</h2>
  <input type="text"  	name="password" 	placeholder="password">
<br><br>
<input type="submit"  	name="OK" 		value="OK">
</form>

<?php
if ( "email"== $_POST['email']) && ("password" == $_POST['password'])
    "projet_papa_recherche.php"
else
    return :"projet_papa_connexion.php"
?>
    

	
	
  