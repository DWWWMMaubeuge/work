<?php
require 'src/connexion.php';

$result = $bdd->prepare("SELECT * FROM matieres");
$result->execute();

$matieres = [];

while($data = $result->fetch()) {
  array_push($matieres, $data[1]);
}

function displayEval($matieres) {

  foreach($matieres as $matiere) {
  echo "
        <div class='input-group mb-3'>
          <div class='input-group-prepend'>
            <label class='input-group-text text-white bg-primary' for=" . $matiere . " style='width: 6rem'>" . $matiere . "</label>
          </div>
          <select class='custom-select' id=\"" . $matiere . "\" onchange='note(\"" . $matiere . "\")'>";
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