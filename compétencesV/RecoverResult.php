<?php
include "idBDD.php";
session_start();

try {
    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=UTF8', $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}
$query=$bdd->prepare("SELECT r.id_mat,r.eval,r.date,m.matiere FROM resultat as r INNER JOIN matieres as m ON r.id_mat = m.id WHERE r.id_user=".$_SESSION['idUser']." GROUP BY r.id_mat ORDER BY r.date DESC");

$query->execute();

$array=$query->fetchAll(PDO::FETCH_ASSOC);
asort($array);
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

