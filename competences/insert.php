<?php
session_start();
include 'src/connexion.php';

  $id_user = $_SESSION["id_user"];

  $id_matiere = (isset($_POST["id_matiere"])) ? $_POST["id_matiere"] : null;
  $note = (isset($_POST["note"])) ? $_POST["note"] : null;

if ($id_matiere && $note > 0) {
    $req = $bdd->prepare("INSERT INTO resultats(id_user, id_matiere, note) 
                          VALUES(:id_user, :id_matiere, :note)
                        ");
                        
    $req->execute(array(
      "id_user" => $id_user,
      "id_matiere" => $id_matiere,
      "note" => $note
    ));
} 
?>