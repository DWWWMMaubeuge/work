<?php
require 'src/connexion.php';

$req = $bdd->prepare("SELECT * FROM formations");
$req->execute();

$formationsArray = [];
while ($data = $req->fetch()) {
  array_push($formationsArray, [$data["id"], $data["formation"]]);
}
$req->closeCursor();

if (isset($_POST["formationName"])) {
  $formationName = $_GET["formationName"];

  // A FINIR
}
?>

<form action="#" method="POST">


  <div class="form-group row">
    <select name="formationName" class='form-control'>
      <option value="#">Sélectionner une formation</option>
      <?php foreach ($formationsArray as $formation) : ?>

        <option value="<?= $formation[0] ?>"><?= $formation[1] ?></option>

      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group row">
    <input type="number" class="form-control" name="nbSkills" id="nbSkills" min="0" max="20" placeholder="Nombre de compétences" required>
  </div>
  <button type="submit" class="btn btn-block btn-success text-white">OK</button>

</form>