<?php
include ( 'AO_fonctions_generalesSQL.php');


setHeaderNoCache();

$req = "SELECT * FROM xavier.marque_voiture;"; 
$result = executeSQL( $req );

//echo $result->num_rows."<br>";

echo "<form action=\"affiche_marques.php\">\n";
while ( $row = $result->fetch_assoc() )
{	
	echo "<input type=\"radio\" id=\"".$row[ 'id' ]."\" name=\"marque_voiture\" value=\"".$row[ 'nom' ]."\">\n";
	echo " <label for=\"".$row[ 'nom' ]."\">".$row[ 'nom' ]."</label><br>\n";
}

echo "</form>\n";


?>

