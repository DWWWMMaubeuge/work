<?php


//$__TEST = true;


function setHeaderNoCache()
{
	echo "<DOCTYPE html>\n";
	echo "<html>\n";
	echo "<head>\n";
	echo "<meta http-equiv=\"Cache-Control\" content=\"no-cache, no-store, must-revalidate\" />\n";
	echo "<meta http-equiv=\"Pragma\" content=\"no-cache\" />\n";
	echo "<meta http-equiv=\"Expires\" content=\"0\" />\n";
	echo "<link href=\"vignette.css\" rel=\"stylesheet\">\n";
	echo "</head>\n";
	echo "<body>\n";
}



// gestion de la session
function gestionSession()
{
	GLOBAL $annonces, $compteur;

	session_start();

	// dictionaire contenant nos annonce
	if ( isset($_SESSION["annonces"]) )
	{
		//echo "session exist<br>\n";
		$annonces = $_SESSION["annonces"];
	}
	else
	{	
		//echo "nouvelle session<br>\n";
		$annonces = array();
		$_SESSION["annonces"] = $annonces;
	}	
	
	// gestion du compteur
	if ( isset($_SESSION["compteur"]) )
	{
		//echo "session exist<br>\n";
		$compteur = $_SESSION["compteur"];
	}
	else
	{	
		//echo "nouvelle session<br>\n";
		$compteur = 0;
		$_SESSION["compteur"] = $compteur;
	}
}
// fin de gestion de la session

if ( $__TEST )
{

	//echo "===================================================<br>\n";  
	//echo "DEBUT section de test du fichier calculerLaSommeDuPanier<br>\n";  



	//echo "FIN de section de test du fichier calculerLaSommeDuPanier<br>\n";  
	//echo "====================================================<br>\n";  
}

function affichageAnnonce($numCard)
{
	GLOBAL $vignettes;

	$vignette = $vignettes[ $numCard ];
	$tit = $vignette[0];
	$par = $vignette[1];
	$numCard++;

	echo"<div class=\"col\">";
        echo"<div class=\"card card$numCard\">";
        	echo"<h5>$tit</h5>";
        	echo"<p>$par</p>";          
        echo"</div>";
    echo"</div>";
}


?>