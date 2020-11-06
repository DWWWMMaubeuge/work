<?php
$__TEST = false;

include ( "MA_saisie_annonces.php" );
include ( "MA_affichage_annonces.php" );
include ( "MA_fonctions_generales.php" );

setHeaderNoCache();
gestionSession();

// la fonction retourne un tableau dans lequel il y a :
// titre (O) 
// description (1) 
// image (2)
// prix (3) 

if ( isset( $_GET[ "IDAnnonce" ]))
{
	$IDAnnonce = $_GET[ "IDAnnonce" ];
}


$ret_annonce_array = saisie_annonce();
if ( $ret_annonce_array != NULL )
{
	//echo "IDAnnonce : $IDAnnonce<br>";
	//print_r($annonces);
    unset( $annonces[ $IDAnnonce ]) ; 
    $annonces[ $IDAnnonce ] = $ret_annonce_array; 

    $_SESSION[ "annonces" ]  = $annonces;
    
    header("location: accueil.php");
}
$cible= "modifier_annonce.php?IDAnnonce=$IDAnnonce";
form_modifier_annonce( $cible, $IDAnnonce );
?>