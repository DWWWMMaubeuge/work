<?php

$adresse         = "localhost";
$utilisateur     = "root";
$password         = "";

$connexion = new mysqli( $adresse, $utilisateur, $password );

if ( $connexion->connect_error == true )
     echo "une erreur de connexion s'est produite<br>";
else
     echo "connexion réussie<br>";



$requete = "select * from maxime.animaux;";

$result = $connexion->query( $requete );

echo "<table>";
while (  $ligne = $result->fetch_assoc()  )
{
    echo "<tr>";
        echo "<td>";
            echo $ligne[ 'nom' ];
        echo "</td>";
        echo "<td>";
            echo $ligne[ 'espece' ];
        echo "</td>";
        echo "<td>";
            echo $ligne[ 'age' ];
        echo "</td>";
        echo "<td>";
            echo $ligne[ 'poids' ];
        echo "</td>";
    echo "</tr>";
}
echo "</table>";


$connexion->close();


?>