<?php

	$varChamp01 = $_POST['Champ01']; //Récupération de la valeur Champ01
	$varChamp02 = $_POST['Champ02']; //Récupération de la valeur Champ02
	
	$MaDateMiseEnLigne = date("Y-m-d h:i:s");
	echo $MaDateMiseEnLigne;
	echo "<br />\n";
	
	echo "Valeur champ 01 : $varChamp01.<br />\n";
	echo "Valeur champ 02 : $varChamp02.<br />\n";

?>


