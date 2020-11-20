<?php
require_once( "parametres.php" );
include_once(  "CO_global_functions.php"  );

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
                                            
if( $_POST['list_stagiaire'] != "" && $_POST['selRole'] != "" ) 
{
    $list_stagiaire = $_POST['list_stagiaire'];
    $role    		= $_POST['selRole'];


	$tabMails = [];
	$mails = str_replace( "\t", " ", $list_stagiaire);
	$lesligne = explode( "\n", $mails );
	foreach ($lesligne as $ligne) 
	{
		$lesMots = explode( " ", $ligne );
		foreach ($lesMots as $mail) 
		{
			if ( filter_var($mail, FILTER_VALIDATE_EMAIL)) 
			{	
			    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail'";
			    $result = executeSQL( $req );
			    $data = $result->fetch_assoc();
			    if ( $data[ 'nb' ] == 0 )
			    {
				    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password, id_session, id_formation) VALUES ( 'NC', 'NC', '$mail', 'NC', 0, 0 )";
				    executeSQL( $req );
				    $req = "INSERT INTO $DB_dbname.mail2inscript ( mail, role ) VALUES ( '$mail', '$role');";
				    $result = executeSQL( $req );
				}
				$req = "UPDATE $DB_dbname.users SET role='FOR' WHERE mail='$mail'";
				executeSQL( $req );
			}
		}
	}
	header( "location: admin.php");
}
?>
