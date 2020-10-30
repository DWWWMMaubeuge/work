<?php
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname=""; 

try 
{

 $conn = new PDO("mysql:host=$servername;dbname", $username, $password);
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
 echo "Connected successfully";       
 echo "<br>";
}
catch (Exception $e)
{
    echo "Connection failed: " . $e->getMessage();
    echo "erreur";
        die('Erreur : ' . $e->getMessage());
}


function executeSQL( $req )
{
	$result = false;
	if ( $req != "" )
	{
		$servername = "localhost";
		$username = "root";
		$password = "";

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






        //create table resultats  ( id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,maj datetime, id_user int, id_competence int, result int);   
?>

    
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>Formulaire</title>
</head>
<body>
</body>
</html>
<h1 style=text-align:center>Utilisateur </h1>
<h2 style=text-align:center >Compétences</h2>
<p style=text-align:center>Chosiisez votre langage</p>
<?php
$req = "SELECT * FROM maxime.competences;"; 
		$result = executeSQL( $req );
		echo "<div style=text-align:center>";
		echo "<select style=text-align:center name=\"competences\" id=\"matieres\">\n";
		while ( $row = $result->fetch_assoc() )
			echo "<option value=\"".$row[ 'matieres' ]."\">".$row[ 'matieres' ]."</option>\n";
		echo "</select><br>\n";
		echo "</div>";
		?>
		<br><div style=text-align:center>
		<p>Mettez votre note</p>
<input style=text-align:center id="number" type="number" value="" name="HTML" min="0" max="10">
</div>