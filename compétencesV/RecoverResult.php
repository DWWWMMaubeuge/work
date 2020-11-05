<?php
include "idBDD.php";
session_start();
$idUser=$_SESSION['idUser'];
$query=$bdd->prepare("SELECT r.id_mat,r.eval,r.date,M.matiere
                                FROM resultat AS r
                                    INNER JOIN matieres AS M ON r.id_mat=M.id
                                    INNER JOIN ( 
                                        SELECT id_user AS idUser , id_mat AS idMat , MAX(date) AS evalDate
                                            FROM resultat as r2
                                                INNER JOIN (SELECT id_user AS idUser FROM resultat WHERE id_user=:id_user GROUP BY id_user) a
                                                ON r2.id_user = a.idUser
                                                GROUP BY idMat ) m
                                                    on r.id_mat=m.idMat 
                                                    AND r.date=m.evalDate"
                                                    );


/*$query=$bdd->prepare("SELECT r.id_mat,r.eval,r.date,m.matiere
                                FROM resultat AS r
                                INNER JOIN matieres AS m on r.id_mat=m.id
                                WHERE r.id_user=:id_user
                                GROUP BY r.id_mat");*/
$query->bindParam(':id_user', $idUser);
$query->execute();
$array=$query->fetchAll(PDO::FETCH_ASSOC);
sort($array);
//var_dump($array);

function affTable($array){
    echo "<table class='table table-striped'>";
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
        $arr=explode(' ', $note['date']);

        echo "<td>".$arr[0]."</td>";
    }
    echo "</tr>";
    echo "</table>";
}
affTable($array);

?>

