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

?> 


