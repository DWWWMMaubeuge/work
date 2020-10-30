<?php
include ( 'AO_fonctions_generalesSQL.php');
$type = $_GET[ 'type' ];

$req = "SELECT * FROM xavier.annonces Where typeannonce=\"$type\";"; 

$result = executeSQL( $req );

while ( $row = $result->fetch_assoc() )
{	
	//echo $row[ 'typeannonce' ]."<br>"; 

	if ( $row[ 'typeannonce' ] == 'IMO')
		$anonce = new Immobilier();
	else if ( $row[ 'typeannonce' ] == 'CAR')
		$anonce = new Voiture();
	else if ( $row[ 'typeannonce' ] == 'VOI')
		$anonce = new Voilier();
	else if ( $row[ 'typeannonce' ] == 'ANI')
		$anonce = new Animaux();
	else
		$anonce = new AnnonceSQL();

	$anonce->readData( $row );
    echo "<div class=\"vignette_annonce\">";
    echo $anonce->show();	
    echo "</div>";
}

?>
