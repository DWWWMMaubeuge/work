<?php
	include( "TP_library_main.php" );
	head( "mon prem site" );
	menu();
	title1( "Ma première page avec du style");


$sport = 
[
	[ 'Limoges'  	, 	"Guimgand 1.12"	, "12-20"],
	[ 'Paris'  		, 	"Marseille"		, "1-2"],
	[ 'Maubeuge'  	, 	"Valenciennes"	, "89-121"]
];



title1( "les résultat ");

affTableauFormatHTML( $sport );
?>



<p>Il lui manque des images, mais au moins, elle a du style. Et elle a desliens, même s'ils ne mènent nulle part...
&hellip;

<p>Je devrais étayer, mais je ne sais comment encore.

<!-- Signer et dater la page, c'est une question de politesse! -->
<address>Fait le 5 avril 2004<br>
  par moi.</address>

<?php
	footer();
?>
