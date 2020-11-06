<?php
require './src/connexion.php';

$id_user = $_SESSION["id_user"];

$req = $bdd->prepare("SELECT r.id_matiere, r.note, r.datex, M.mat
                      FROM resultats AS r
                      INNER JOIN matieres AS M ON r.id_matiere = M.id
                        INNER JOIN ( 
                          SELECT id_user AS idUser , id_matiere AS idMat , MAX(datex) AS maxDate
                          FROM resultats as r2
                          INNER JOIN (SELECT id_user AS idUser FROM resultats WHERE id_user = :id_user GROUP BY id_user) a
                            ON r2.id_user = a.idUser
                          GROUP BY idMat ) m
                        ON r.id_matiere = m.idMat 
                        AND r.datex = m.maxDate");
$req->execute(array(
  "id_user" => $id_user
));

$array = $req->fetchAll(PDO::FETCH_ASSOC);
sort($array);
?>