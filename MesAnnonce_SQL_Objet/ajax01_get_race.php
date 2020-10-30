<?php
function executeSQL( $req )
{
	$result = false;
	if ( $req != "" )
	{
		$servername = "10.115.49.73";
		$username = "xavier";
		$password = "xavier";

		// Create connection
		$conn = new mysqli($servername, $username, $password);

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

$espece = $_GET[ 'espece' ];
$req = "select xavier.race_animale.nom from xavier.race_animale, xavier.espece_animale where xavier.espece_animale.id=xavier.race_animale.id_espece and espece_animale.nom='$espece';";

//$req = "SELECT * FROM xavier.race_animale;"; 	
$result = executeSQL( $req );
$str ="";

while ( $row = $result->fetch_assoc() )
	$str .= "<option value=\"".$row[ 'nom' ]."\">".$row[ 'nom' ]."</option>\n";
	echo $str;
?>