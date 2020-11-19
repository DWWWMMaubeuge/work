<?php

function executeSQL( $req )
{
	$result = false;
	if ( $req != "" )
	{
		$servername = "localhost";
		$username = "student";
		$password = "student";

		// Create connection
		$conn = new mysqli($servername, $username, $password);

		// Check connection
		if ($conn->connect_error) 
		{
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

//serverPageAJAX04_writeInDB.php?data=

$data = $_GET[ 'data' ];

$requete = "INSERT INTO DWWM_Maubeuge.testAjax (data) values ( '$data' );";

executeSQL( $requete );

?>