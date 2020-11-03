<?php
// global functions



// global functions

//variables de connextion Fatima

$DB_servername 	= "localhost:3306";
$DB_username 		= "root";
$DB_password 		= "" ;
$DB_dbname 		= "skills";

// variables de connextion Xavier
/*$DB_servername 		= "localhost";
$DB_username 		= "student";
$DB_password 		= "student" ;
$DB_dbname 			= "DWWM_Maubeuge";

*/
function executeSQL( $req )
{
	GLOBAL  $DB_servername, $DB_username, $DB_password, $DB_dbname;


	$result = false;
	if ( $req != "" )
	{

		// Create connection
		//echo "new mysqli($DB_servername, $DB_username, $DB_password);";
		$conn = new mysqli($DB_servername, $DB_username, $DB_password);

		// Check connection
		if ($conn->connect_error) 
		{
			print_r( $conn );
			die("Connection failed: " . $conn->connect_error);
		}


		//echo $req."<br>";
		$result = $conn->query( $req );
		if ($conn->error) 
		{
		  die("erreur insert: " . $conn->error);
		}

		$conn->close();
	}
	return $result;
}