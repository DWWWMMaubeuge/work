<?php
// global functions

require_once ( "parametres.php" );


function executeSQL( $req )
{
	GLOBAL $DB_URL, $DB_user, $DB_PW;

	$result = false;
	if ( $req != "" )
	{

		//echo "new mysqli($DB_URL, $DB_user, $DB_PW);<br>";
		// Create connection
		$conn = new mysqli($DB_URL, $DB_user, $DB_PW);

		// Check connection
		if ($conn->connect_error) 
		{
		  die("Connection failed: " . $conn->connect_error);
		}


		echo $req."<br>";
		$result = $conn->query( $req );
		if ($conn->error) 
		{
		  die("erreur insert: " . $conn->error);
		}

		$conn->close();
	}
	return $result;
}



function parseMailIntoText( $text  )
{
	//// [-0-9a-zA-Z_.+]+@[-0-9a-zA-Z.+]+.[a-zA-Z]{2,4}
	$tabMails = [];
	$mails = str_replace( "\t", " ", $text);
	$lesligne = explode( "\n", $mails );
	foreach ($lesligne as $ligne) 
	{
		$lesMots = explode( " ", $ligne );
		foreach ($lesMots as $mail) 
			if ( filter_var($mail, FILTER_VALIDATE_EMAIL)) 
				array_push($tabMails, $mail ); 	

	}
	return $tabMails;
}

function userExist( $mail )
{
	GLOBAL $DB_dbname;

    $req = "SELECT count(*) as nb FROM $DB_dbname.users WHERE mail='$mail'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
	$occurence = $data[ 'nb' ];

	return  $occurence;
}

// inscrit un utilisateur avec son mail
// retourne son ID
function addUser( $mail, $role )
{
	GLOBAL $DB_dbname;

	if ( userExist( $mail ) == 0 )
	{
	    $req = "INSERT INTO $DB_dbname.users ( name, surname, mail, password, id_session, id_formation, role) VALUES ( 'NC', 'NC', '$mail', 'NC', 0, 0, '$role' )";
	    executeSQL( $req );
	    $req = "INSERT INTO $DB_dbname.mail2inscript ( mail, role ) VALUES ( '$mail', '$role');";
	    executeSQL( $req );
	}
    
    $req = "SELECT * FROM $DB_dbname.users WHERE mail='$mail'";
    $result = executeSQL( $req );
    $data = $result->fetch_assoc();
	
	return $data[ 'id' ];
}



?>