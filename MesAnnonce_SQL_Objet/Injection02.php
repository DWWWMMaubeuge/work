<?php

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


$req = "SELECT * FROM  xavier.test_injection;";
echo "$req<br>";
$rows = executeSQLMySQLI( $req );
while( $row = $rows->fetch_array() )
{
    echo  $row[1]." ".$row[2]."ans<br>"; 
} 

echo "<br><br>";

$req = "SELECT * FROM  xavier.test_injection;";
echo "$req<br>";
$rows = executeSQLMySQLI( $req );
while( $row = $rows->fetch_assoc() )
{
    echo  $row['nom']." ".$row['age']."ans<br>"; 
} 

echo "<br><br>";

$req = "SELECT * FROM  xavier.test_injection;";
echo "$req<br>";
$rows = executeSQLMySQLI( $req );
while( $row = $rows->fetch_object() )
{
    echo  $row->nom." ".$row->age."ans<br>"; 
} 



?>
