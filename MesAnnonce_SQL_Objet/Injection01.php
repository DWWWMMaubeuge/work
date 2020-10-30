<?php

// CREATE TABLE test_injection ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, nom varchar(255), age int );


function openDB()
{
    $servername = "10.115.49.73";
    $username = "xavier";
    $password = "xavier";
    $dbname = "xavier";
    
    try 
    {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } 
    catch( PDOException $e) 
    {
        echo "Error: " . $e->getMessage();
        die("Connection failed: programme termine");
    }
} 




function executeSQLPDO( $req )
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



function executeSQLMySQLI( $req )
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


if ( $_POST )
{
    $nom = $_POST[ 'nom' ];
    $age = $_POST[ 'age' ];

    echo "avant traitement : $nom  $age ans<br>";

    $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');

    echo "apres  : $nom $age ans<br>";
    if ( $nom != "" )
    {
        //$req = "INSERT INTO xavier.test_injection (nom) values ('$nom');";
        //$req = "drop table xavier.test_injection;";
        //echo "$req<br>";
        //executeSQL( $req );
        
        $conn = openDB();
        try 
        {        
          $stmt = $conn->prepare("INSERT INTO xavier.test_injection (nom, age) VALUES (:xnom, :xage )");

          $stmt->bindParam(':xnom', $nom );
          $stmt->bindParam(':xage', $age );
          // insert a row
          $stmt->execute();
          echo "New records created successfully";
        } 
        catch( PDOException $e) 
        {
          echo "Error: " . $e->getMessage();
          die("Connection failed: programme termine");
        }
        $conn = null;
    }
}

?>



<form action="Injection01.php" method="POST">
    <input type="text" name="nom" placeholder="saisie ton nom"><br> 
    <input type="text" name="age" placeholder="saisie ton age"><br> 
    <textarea name="cv"  rows="10" cols="50"></textarea><br>    
    <input type="submit" value="OK"> 
</form>