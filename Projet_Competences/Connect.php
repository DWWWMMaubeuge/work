<?php
    // fonction global & varia connexion

	$DB_URL 	= "localhost";

	$DB_user 	= "root";
	$DB_PW 		= "";
	$DB_dbname 	= "dwwm_maubeuge";




    function executeSQL( $req )
    {
        GLOBAL $DB_URL, $DB_user, $DB_PW, $DB_dbname;
    
        $result = false;
        if ( $req != "" )
        {
    
            //echo "new mysqli($DB_URL, $DB_user, $DB_PW);<br>";
            // Create connection
            $conn = new mysqli($DB_URL, $DB_user, $DB_PW, $DB_dbname);
    
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