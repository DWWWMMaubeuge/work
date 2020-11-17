<?php
session_start();
include 'src/connexion.php';

  $id_user = $_SESSION["id_user"];

  $id_competence = (isset($_POST["id_competence"])) ? $_POST["id_competence"] : null;
  $evaluation = (isset($_POST["evaluation"])) ? $_POST["evaluation"] : null;

if ($id_competence && $evaluation > 0) {
    $req = $bdd->prepare("INSERT INTO resultats(id_user, id_competence, evaluation) 
                          VALUES(:id_user, :id_competence, :evaluation)
                        ");
                        
    $req->execute(array(
      "id_user" => $id_user,
      "id_competence" => $id_competence,
      "evaluation" => $evaluation
    ));
} 
?>