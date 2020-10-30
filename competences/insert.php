<?php
session_start();
include 'src/connexion.php';

$result = $bdd->prepare("SELECT * FROM matieres");
$result->execute();

$nom_matiere = [];

while ($data = $result->fetch()) {
  array_push($nom_matiere, $data[1]);
}
$result->closeCursor();

$req = $bdd->prepare("SELECT * FROM users");
$req->execute();

$id_user = [];
while ($data = $req->fetch()) {
  array_push($id_user, $data[0]);
}
$result->closeCursor();


$req = $bdd->prepare("INSERT INTO resultats(date, id_user, id_matiere, note) VALUES(NOW(), :id_user, :nom_matiere, :note)");
$req->execute(array(
  "id_user" => $id_user,
  "nom_matiere" => $nom_matiere,
  "note" => $note
));
?>