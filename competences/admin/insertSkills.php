<?php
session_start();
require '../src/connexion.php';

/* FAIRE REQUETE POUR INSERER SKILL SI PAS PRESENT DANS LA BDD */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <title>Ajouter une compétence</title>
</head>

<body>
  <main class="container">

    <div class="registration-form">

      <?php if (isset($_GET["error"])) : ?>
        <?php if (isset($_GET["skill"])) : ?>
          <div class="alert alert-danger item mx-auto">
            La compétence existe déjà
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <form action="#" method="POST">
        <div class="form-title">
          <h5>Ajouter une compétence</h5>
        </div>
        <div class="form-group">
          <input type="text" class="form-control item" name="skillName" placeholder="Compétence" required>
        </div>
        <button href="#" type="submit" class="btn btn-success"><i class="far fa-edit"></i> Ajouter</button>
        <a href="./index.php" type="submit" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Retour</a>
      </form>
    </div>

  </main>

</body>

</html>