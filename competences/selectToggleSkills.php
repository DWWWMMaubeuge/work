<?php
require 'src/connexion.php';
require './navBar.php';

$req = $bdd->prepare("SELECT * FROM formations");
$req->execute();

$formationsArray = [];
while ($data = $req->fetch()) {
  array_push($formationsArray, [$data["id"], $data["formation"]]);
}
$req->closeCursor();

if (isset($_POST["formationName"])) {
  $id_formation = $_POST["formationName"];

  header('Location: admin/toggleSkills.php?id_formation=' . $id_formation);
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
            <option>Sélectionner une formation</option>

            <?php foreach ($formationsArray as $formation) : ?>
                <option value="<?= $formation[0] ?>"><?= $formation[1] ?></option>
            <?php endforeach; ?>

        </select>
        </div>

        <button type="submit" class="btn btn-block btn-success text-white" id="ok">OK</button>

      </form>
    </div>

  </main>

</body>
</html>