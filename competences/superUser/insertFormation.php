<?php
require '../navBar.php';
require 'traitementInsertFormation.php';

?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/insert.css">
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

      <form action="#" method="GET" id="insertFormation">
        <div class="form-group">
          <input type="text" class="form-control item" name="formation" id="formation" placeholder="Formation" required>
        </div>
        <div class="form-group">
          <input type="number" class="form-control item" name="nbSkills" id="nbSkills" min="0" max="20" placeholder="Nombre de compétences à ajouter" required>
        </div>
        <button type="submit" class="btn btn-block btn-success"><i class="far fa-edit"></i> Ajouter</button>
      </form>
    </div>

  </main>

</body>
</html>