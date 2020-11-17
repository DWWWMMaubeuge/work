<?php
require '../src/connexion.php';

$req = $bdd->prepare("SELECT * FROM formations");
$req->execute();

$formationsArray = [];
while ($data = $req->fetch()) {
  array_push($formationsArray, [$data["id"], $data["formation"]]);
}
$req->closeCursor();

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
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/admin.css">
</head>

<body>

  <div class="container admin">
    

    <div class="row">
      <h1 class="mb-4">Liste des compétences</h1>

      <select name="formationName" class='form-control'>
        <option value="#">Sélectionner une formation</option>

        <?php foreach ($formationsArray as $formation) : ?>
          <option value="<?= $formation[0] ?>"><?= $formation[1] ?></option>
        <?php endforeach; ?>

      </select>
    </div>

    <div class="row">
      
      <table class="table table-striped table-bordered table-hover table-sm">
        <thead>
          <tr>
            <th scope="col">Compétences</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require 'displaySkillsAdmin.php';
          ?>
        </tbody>
      </table>

    </div>
  </div>

  <script src="../js/test.js"></script>
</body>

</html>