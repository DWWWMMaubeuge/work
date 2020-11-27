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
			mysqli_set_charset($conn, "utf8");
			// Check connection
			if ($conn->connect_error) 
			{
			die("Connection failed: " . $conn->connect_error);
			}

			//echo $req."<br>"; /* <<<<<<<<********************** DEBUG*******************>>>>>> */
			$result = $conn->query( $req );
			if ($conn->error) 
			{
			die("erreur insert: " . $conn->error);
			}

			$conn->close();
	}
	return $result;
}

function MailExist( $mail )
{
	GLOBAL $DB_dbname;

    $req        = "SELECT count(*) as NB FROM $DB_dbname.users WHERE mail='$mail'";
    $result     = executeSQL( $req );
    $data       = $result->fetch_assoc();
	$doubleMail = $data[ 'NB' ];

	return  $doubleMail;
}





?> 


<!-- mysql_query("SET NAMES UTF8"); -->
