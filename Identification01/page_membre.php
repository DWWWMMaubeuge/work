<?php

session_start ();

$user = $_SESSION['user'];

echo '<html>';
echo '<head>';
echo '<title>Page de notre section membre</title>';
echo '</head>';

echo '<body>';
echo "Votre login est $user ";
echo '<br />';

// On affiche un lien pour fermer notre session
echo '<a href="./logout.php">Déconnection</a>';
	 	
?>