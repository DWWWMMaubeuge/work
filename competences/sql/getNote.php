<?php
require './src/connexion.php';

$id_user = $_SESSION["id_user"];

$req = $bdd->prepare("SELECT r.id_competence, r.evaluation, M.competences
                      FROM resultats AS r
                      INNER JOIN competences AS M ON r.id_competence = M.id
                        INNER JOIN ( 
                          SELECT id_competence AS idMat , MAX(datex) AS maxDate
                          FROM resultats as r2
                          INNER JOIN (SELECT id_user AS idUser FROM resultats WHERE id_user = :id_user GROUP BY id_user) a
                            ON r2.id_user = a.idUser
                          GROUP BY idMat ) m
                        ON r.id_competence = m.idMat 
                        AND r.datex = m.maxDate
                        AND r.id_formation = m.id_formation
                        AND M.active = 1");
$req->execute(array(
  "id_user" => $id_user
));

$array = $req->fetchAll(PDO::FETCH_ASSOC);
sort($array);
?>