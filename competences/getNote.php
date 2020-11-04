<?php
require 'src/connexion.php';

$id_user = $_SESSION["id_user"];

$req = $bdd->prepare("SELECT r.id_matiere, m.mat, r.note
                        FROM matieres as m
                        INNER JOIN resultats as r
                        ON m.id = r.id_matiere
                          AND r.id_user = :id_user
                        GROUP BY r.id_matiere");
$req->execute(array(
  "id_user" => $id_user
));

$array = $req->fetchAll(PDO::FETCH_ASSOC);
?>