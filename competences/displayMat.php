<?php
require 'src/connexion.php';
include 'sql/getNote.php';

$result = $bdd->prepare("SELECT * FROM competences WHERE id_formation = :id_formation AND active = 1");
$result->execute(array(
  "id_formation" => $_SESSION["id_formation"]
));

$matieres = [];
while($data = $result->fetch(PDO::FETCH_ASSOC)) {
  array_push($matieres, $data);
}

function displayEval($matieres, $array) {
  foreach($matieres as $matiere) {

  echo "
        <div class='col-xs-12 col-sm-4 col-md-3 col-lg-4'>
          <div class='input-group mb-3 item'>
            <div class='input-group-prepend'>
              <label class='input-group-text text-white button-form' for=" . $matiere['id'] . " style='width: 8rem'>" . $matiere['competences'] . "</label>
            </div>
            <select class='custom-select' id=\"" . $matiere['id'] . "\">";
                optionNote($array, $matiere['id']);
  echo "    </select></div></div>";
  }
}

function selectNote($array, $id_mat, $value) {
  for($i = 0; $i < count($array); $i++) {
    if($id_mat == $array[$i]["id_competence"]) {
      if($value == $array[$i]["evaluation"]) {
        return 'selected';
      }
    }
  }
}

function optionNote($array, $id_mat) {
  echo '<option>Auto-évaluation...</option>';
  for($i = 0; $i < 11; $i++) {
    $x = selectNote($array, $id_mat, $i);
    echo '<option value="'. $i .'" '. $x .'>' . $i . '</option>';
  }
}
?>