<?php
// global functions



function executeSQL( $req )
{
    $result = false;
    if ( $req != "" )
    {
        $servername = "localhost:3306";
        $username = "root";
        $password = "" ;

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
?>