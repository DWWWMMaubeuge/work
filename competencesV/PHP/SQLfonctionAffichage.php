<?php
include "idBDD.php";
//session_start();
if (isset($_SESSION['formation'])) {
    $query1 = $bdd->prepare("SELECT * from matieres WHERE id_form=" . $_SESSION['formation']." AND active=1");
    $query1->execute();
    $skills = [];
    while ($array = $query1->fetch(PDO::FETCH_ASSOC)) {
        array_push($skills, $array);
    }
}
if (isset($_SESSION['formation'])) {
    $query = $bdd->prepare("SELECT * from matieres WHERE id_form=" . $_SESSION['formation']." AND active=0");
    $query->execute();
    $skills2 = [];
    while ($array = $query->fetch(PDO::FETCH_ASSOC)) {
        array_push($skills2, $array);
    }
}
if (isset($_SESSION['idUser']) && isset($_SESSION['formation'])) {
    $idUser = $_SESSION['idUser'];
    $idForm= $_SESSION['formation'];
}
//var_dump($skills);
$query2=$bdd->prepare("SELECT r.id_mat,r.eval
                                FROM resultat AS r
                                    INNER JOIN matieres AS M ON r.id_mat=M.id
                                    INNER JOIN ( 
                                        SELECT id_mat AS idMat , MAX(date) AS evalDate
                                            FROM resultat as r2
                                                INNER JOIN (SELECT id_user AS idUser FROM resultat WHERE id_user=:id_user GROUP BY id_user) a
                                                ON r2.id_user = a.idUser
                                                GROUP BY idMat ) m 
                                                    ON r.id_mat=m.idMat 
                                                    AND r.date=m.evalDate
                                                    AND r.id_form=m.id_form
                                                    AND M.active=1
                     ");

/*$query2 =$bdd->prepare("SELECT *
                                    FROM matieres m LEFT JOIN
                                        (SELECT r.eval,r.id_mat,r.id_form,
                                            ROW_NUMBER() OVER (PARTITION BY id_mat, id_user ORDER BY date DESC) as seqnum
                                            FROM resultat r
                                            WHERE r.id_user = :id_user 
                                            ) r
                                    ON m.id = r.id_mat AND
                                    seqnum = 1
                                    WHERE r.id_form = :id_form");*/

$query2->bindParam(':id_user', $idUser);
//$query2->bindParam(':id_form', $idForm);
$query2->execute();
$array2=$query2->fetchAll(PDO::FETCH_ASSOC);
sort($array2);
//var_dump($array2);

$query3 = $bdd->prepare('SELECT * FROM formation ');
$query3->execute();
$array3=$query3->fetchAll(PDO::FETCH_ASSOC);