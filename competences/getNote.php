<?php
  require 'src/connexion.php';

  $req = $bdd->prepare("SELECT r.id_matiere, r.id_user, m.mat, r.note, MAX(r.datex)
                        FROM matieres as m
                        INNER JOIN resultats as r
                        ON m.id = r.id_matiere
                      ");
  $req->execute();

  $result = [];
  while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
    array_push($result, $data);
  }
?>