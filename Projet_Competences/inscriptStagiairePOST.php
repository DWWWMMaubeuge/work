<?php
require_once( "Connect.php" );
include_once(  "Serveur.php"  );

//inscriptFormateur.php?mail="+mail+"&idFormation="+ID_formation;
// [-0-9a-zA-Z_.+]+@[-0-9a-zA-Z.+]+.[a-zA-Z]{2,4}

$mails = <<<XXX
Thomas 		0662151729	thomas_3004@hotmail.fr			fibre	FixIt#2681 			Fixito
Fatima 		0610032073	fatformationafpa@gmail.com		ADSL	Fatima#0358			Fatima-git
Fouad 		0603462493	ahanchir@live.fr 				Fibre	Pusher#7933			iPuSheR
Flavia 		0768259876	fortunatoflavia@outlook.com		ADSL	FlaVia#6711			fla1701
Steven 		0777696681	stevenhonor@live.fr				<1Mb/s	The_Evil_Fox#9722	The-Evil-Fox
alex 		0602594578	alex.kolakowski@outlook.fr		<1Mb/s	Red La Fougère#0305	redlafougere
axel 		0640897634	axel.mathez@gmail.com			2Mb/s	DrayZix #1138		DrayZix
Valentin 	0764025296	valentin.crapez1995@gmail.com	<1Mb/s	Cendri#9769			ValCendri
Steven 		0636567870	jeffrey_stl@hotmail.fr			4G		Stev-kun#2038		Stev-kun
Pierre 		0671323818	delattre.pierre@outlook.fr		fibre	Mr_Personne#8536	Mr-Personne59
Maxime 		0618411174	maximewilmot@gmail.com			10Mb/s	Max5989 #1384 		MaxW5989
Nicola 		0781148505	nicolascaulier@gmail.com		Fibre	Steelux2610#0764	nicolascaulier
Xavier		O601791744  xavier.bourget@gmail.com				xavier#7128			DWWWMMaubeuge
XXX;

echo "WWWW<br>";
                                            
if( $_POST['list_stagiaire'] != "" && $_POST['sesFormation2'] != "" ) 
{
    $list_stagiaire = $_POST['list_stagiaire'];
    $ID_session    	= $_POST['sesFormation2'];

echo "XXX<br>";


	$tabMails = [];
	$mails = str_replace( "\t", " ", $list_stagiaire);
	$lesligne = explode( "\n", $mails );
	foreach ($lesligne as $ligne) 
	{
		$lesMots = explode( " ", $ligne );
		foreach ($lesMots as $mot) 
		{
			if ( filter_var($mot, FILTER_VALIDATE_EMAIL)) 
			{	
			    $req = "INSERT INTO $DB_dbname.mail2inscript ( mail, ID_session, type ) VALUES ( '".$mot."', ".$ID_session.", 'user');";
			    $result = executeSQL( $req );				
			    //array_push($tabMails, $mot);
	  			//echo $mot, "<br>";
			}
		}
	}
	header( "location: admin_home.php");

}
?>
