<?php
	include( "TP_library_main.php" );
	head( "les liens interessants" );
	menu();
	title1( "mes liens préférés");

	myLink( "https://www.twitch.tv/bromatiquestv", "Bromatique TV" );
	myLink( "https://fr.wikipedia.org/wiki/PHP", "le PHP" );
	myLink( "https://www.pinterest.fr/defroi/truc-a-la-con/", "trucs à la con" );

	footer();
?>
