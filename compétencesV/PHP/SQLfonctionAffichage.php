<?php
include "idBDD.php";

$query1 = $bdd->prepare('SELECT * from matieres');
$query1->execute();
$skills=[];
while ($array = $query1->fetch(PDO::FETCH_ASSOC)) {
    array_push($skills, $array);
}
$idUser=$_SESSION['idUser'];
$query2=$bdd->prepare("SELECT r.id_mat,r.eval
                                FROM resultat AS r
                                    INNER JOIN ( 
                                        SELECT id_mat AS idMat , MAX(date) AS evalDate
                                            FROM resultat as r2
                                                INNER JOIN (SELECT id_user AS idUser FROM resultat WHERE id_user=:id_user GROUP BY id_user) a
                                                ON r2.id_user = a.idUser
                                                GROUP BY idMat ) m 
                                                    ON r.id_mat=m.idMat 
                                                    AND r.date=m.evalDate");

/*$query2=$bdd->prepare("SELECT r.id_mat,r.eval,MAX(r.date),m.matiere
                                FROM resultat AS r
                                INNER JOIN matieres AS m on r.id_mat=m.id
                                WHERE r.id_user=:id_user
                                GROUP BY r.id_mat");*/

$query2->bindParam(':id_user', $idUser);
$query2->execute();
$array2=$query2->fetchAll(PDO::FETCH_ASSOC);
sort($array2);
//var_dump($array2);