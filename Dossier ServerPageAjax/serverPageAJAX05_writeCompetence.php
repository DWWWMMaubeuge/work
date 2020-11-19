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

//serverPageAJAX04_writeCompetence.php?id="+id+"&value="+result

$id 	= $_GET[ 'id' ];
$val 	= $_GET[ 'value' ];

$requete = "INSERT INTO DWWM_Maubeuge.results (id_skill, result) values ( $id, $val );";

executeSQL( $requete );

?>