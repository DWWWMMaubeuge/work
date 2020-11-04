<?php
include "idBDD.php";
session_start();

$query=$bdd->prepare("SELECT r.id_mat,r.eval,r.date,m.matiere FROM resultat as r INNER JOIN matieres as m ON r.id_mat = m.id WHERE r.id_user=".$_SESSION['idUser']." GROUP BY r.id_mat ");

$query->execute();

$array=$query->fetchAll(PDO::FETCH_ASSOC);
sort($array);
//var_dump($array);

function affTable($array){
    echo "<table class='table'>";
    echo "<thead class='thead-dark'>";
    echo "<tr >";
    foreach($array as $note){
        echo "<th>".$note['matiere']."</th>";
    }
    echo "</tr>";
    echo "</thead>";
    echo "<tr>";
    foreach($array as $note){
        echo "<td>".$note['eval']."</td>";
    }
    echo "</tr>";
    echo "<tr >";
    foreach($array as $note){
        echo "<td>".$note['date']."</td>";
    }
    echo "</tr>";
    echo "</table>";
}
affTable($array);

?>

