<?php
include "idBDD.php";
session_start();
$idUser=$_SESSION['idUser'];
//$idForm=$_SESSION['formation'];
$query=$bdd->prepare("SELECT r.id_mat,r.eval,r.date,r.id_form,M.matiere
                                FROM resultat AS r
                                    INNER JOIN matieres AS M ON r.id_mat=M.id
                                    INNER JOIN ( 
                                        SELECT id_user AS idUser , id_mat AS idMat , MAX(date) AS evalDate
                                            FROM resultat as r2
                                                INNER JOIN (SELECT id_user AS idUser FROM resultat WHERE id_user=:id_user GROUP BY id_user) a
                                                ON r2.id_user = a.idUser
                                                GROUP BY idMat ) m
                                                    on r.id_mat=m.idMat 
                                                    AND r.date=m.evalDate
                                                    AND r.id_form=M.id_form
                                                    AND M.active=1"
);


/*$query=$bdd->prepare("SELECT *
                                    FROM matieres m LEFT JOIN
                                        (SELECT r.id_mat,r.eval,r.date,r.id_form,
                                            ROW_NUMBER() OVER (PARTITION BY id_mat, id_user ORDER BY date DESC) as seqnum
                                            FROM resultat r
                                            WHERE r.id_user = :id_user 
                                            ) r
                                    ON m.id = r.id_mat AND
                                    seqnum = 1
                                    WHERE r.id_form = :id_form");*/


$query->bindParam(':id_user', $idUser);
/*$query->bindParam(':id_form',$idForm);*/
$query->execute();
$array=$query->fetchAll(PDO::FETCH_ASSOC);
sort($array);
//var_dump($array);