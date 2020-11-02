<?php
require 'src/connexion.php';

$result = $bdd->prepare("SELECT * FROM matieres");
$result->execute();

$matieres = [];
while($data = $result->fetch(PDO::FETCH_ASSOC)) {
  array_push($matieres, $data);
}

function displayEval($matieres) {
  foreach($matieres as $matiere) {
  echo "
        <div class='input-group mb-3'>
          <div class='input-group-prepend'>
            <label class='input-group-text text-white bg-primary' for=" . $matiere['id'] . " style='width: 6rem'>" . $matiere['mat'] . "</label>
          </div>
          <select class='custom-select' id=\"" . $matiere['id'] . "\")'>";
            selectNote();
  echo "  </select></div>";
  }
}

function selectNote() {
  echo '<option selected>Auto-évaluation...</option>';
  for($i = 0; $i < 11; $i++) {
    echo '<option value="'. $i .'">' . $i . '</option>';
  }
}