<?php
require 'src/connexion.php';
<<<<<<< HEAD
<<<<<<< HEAD
require './navBar.php';

=======
>>>>>>> 49803271f7874ef09e9d87cc2fe4c1665cdf2784
=======
>>>>>>> 49803271f7874ef09e9d87cc2fe4c1665cdf2784

$req = $bdd->prepare("SELECT * FROM formations");
$req->execute();

$formationsArray = [];
while ($data = $req->fetch()) {
  array_push($formationsArray, [$data["id"], $data["formation"]]);
}
$req->closeCursor();

<<<<<<< HEAD
<<<<<<< HEAD
if (isset($_POST["formationName"]) && isset($_POST["nbSkills"])) {
  $formationName = $formationsArray[$_POST["formationName"]-1][1];
  $id_formation = $_POST["formationName"];
  $nbSkills = $_POST["nbSkills"];

  header('Location: admin/insertSkillsInFormation.php?id_formation=' . $id_formation . '&formation=' . $formationName . '&nbSkills=' . $nbSkills);
  exit();
} 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/insert.css">
</head>

<body>

  <?= $nav = navBar(); ?>

  <main class="container">

    <div class="registration-form">

      <?php if (isset($_GET["error"])) : ?>
        <?php if (isset($_GET["formation"])) : ?>
          <div class="alert alert-danger item mx-auto">
            Cette formation existe déjà
          </div>
        <?php endif; ?>
      <?php endif; ?>

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

        <button type="submit" class="btn btn-block btn-success text-white" id="ok">OK</button>

      </form>
    </div>

  </main>

</body>
</html>
=======
=======
>>>>>>> 49803271f7874ef09e9d87cc2fe4c1665cdf2784
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

<<<<<<< HEAD
</form>
>>>>>>> 49803271f7874ef09e9d87cc2fe4c1665cdf2784
=======
</form>
>>>>>>> 49803271f7874ef09e9d87cc2fe4c1665cdf2784
