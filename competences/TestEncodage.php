<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

</head>
<body>

<?php
//    CREATE TABLE  tstEncodage ( id INT AUTO_INCREMENT PRIMARY KEY NOT NULL, datex  TIMESTAMP DEFAULT CURRENT_TIMESTAMP, name VARCHAR(255), id_formation INT  );

//INSERT INTO tstEncodage ( name, id_formation ) VALUES ( "électisé", 1 );
//INSERT INTO tstEncodage ( name, id_formation ) VALUES ( "ça étè", 1 );
//INSERT INTO tstEncodage ( name, id_formation ) VALUES ( "& où", 1 );
//INSERT INTO tstEncodage ( name, id_formation ) VALUES ( "goût", 1 );

// param de connexion BDD
$adresse = "localhost";
$utilisateur = "root";
$password = "";

$DB_dbname = "fouad";

$connexion = new mysqli($adresse, $utilisateur, $password);

if ($connexion->connect_error == true) {
    echo "une erreur de connexion s'est produite<br>";
}

$result = $connexion->query("select * from $DB_dbname.tstEncodage");

$connexion->close();

while( ($ligne = $result->fetch_assoc()) )
    {
        $str = $ligne[ 'name' ]."<br>\n"; 
        echo utf8_encode ( $str );
    }
?>
</body>
</html>

