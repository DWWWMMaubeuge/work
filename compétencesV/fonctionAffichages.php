<?php
include "idBDD.php";

$query1 = $bdd->prepare('SELECT * from matieres');
$query1->execute();
$skills=[];
while ($array = $query1->fetch(PDO::FETCH_ASSOC)) {
    array_push($skills, $array);
}
$query2=$bdd->prepare("SELECT r.id_mat,r.eval FROM resultat as r INNER JOIN matieres as m ON r.id_mat = m.id WHERE r.id_user=".$_SESSION['idUser']." GROUP BY r.id_mat ");

$query2->execute();

$array2=$query2->fetchAll(PDO::FETCH_ASSOC);
sort($array2);
//var_dump($array2);

function formMat($skills,$i,$note){
    foreach( $skills as $array) {
        //var_dump($array);
        echo "<div class='col-4'>";
            echo "<div class='input-group mb-3'>";
            echo "<div class='input-group-prepend'>";
            echo "<label class='input-group-text bg-primary' style='width:6rem' for=" . $array['id'] . ">" . $array['matiere'] . "</label>";
            echo "</div>";
            if (!isset($note[$i])) {
                echo "<input  class='form-control border border-primary' type=\"number\" step=\"1\" id=" . $array['id'] . " name=" . $array['matiere'] . " min='0' max='10'>";
            } else {
                echo "<input  class='form-control border border-primary' type=\"number\" step=\"1\" id=" . $array['id'] . " name=" . $array['matiere'] . " value=" . $note[$i]['eval'] . " min='0' max='10'>";
            }
            $i++;
            echo "</div>";
        echo "</div>";
    }
}

?>