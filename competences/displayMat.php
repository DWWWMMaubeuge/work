<?php
require 'src/connexion.php';
include 'getNote.php';

$result = $bdd->prepare("SELECT * FROM matieres");
$result->execute();

$matieres = [];
while($data = $result->fetch(PDO::FETCH_ASSOC)) {
  array_push($matieres, $data);
}

function displayEval($matieres, $array, $i) {
  foreach($matieres as $matiere) {
  echo "
        <div class='col-4'>
          <div class='input-group mb-3'>
            <div class='input-group-prepend'>
              <label class='input-group-text text-white bg-primary' for=" . $matiere['id'] . " style='width: 6rem'>" . $matiere['mat'] . "</label>
            </div>
            <select class='custom-select' id=\"" . $matiere['id'] . "\">";
              if(!isset($array[$i])) {
                optionNote2();
              } else {
                optionNote($array, $matiere['id']);
              }   
              $i++;  
  echo "    </select></div></div>";
  }
}

function selectNote($array, $id_mat, $value) {
  if($value == $array[$id_mat-1]["note"]) {
    return 'selected';
  }
}

function optionNote($array, $id_mat) {
  echo '<option>Auto-évaluation...</option>';
  for($i = 0; $i < 11; $i++) {
    $x = selectNote($array, $id_mat ,$i);
    echo '<option value="'. $i .'" '. $x .'>' . $i . '</option>';
  }
}

function optionNote2()
{
  echo '<option selected>Auto-évaluation...</option>';
  for ($i = 0; $i < 11; $i++) {
    echo '<option value="' . $i . '">' . $i . '</option>';
  }
}
?>