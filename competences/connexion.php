<?php
session_start();
require 'sql/traitementConnexion.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Connexion</title>
</head>

<body>
  <main class="container">

    <div class="registration-form">

      <?php if (isset($_GET["error"])) : ?>
        <div class="alert alert-danger item mx-auto">
          Utilisateur Inconnu
        </div>
      <?php elseif (isset($_GET["success"])) : ?>
        <div class="alert alert-success item item mx-auto">
          Utilisateur ajouté
        </div>
      <?php endif; ?>

      <form action="#" method="POST">
        <div class="form-title">
          <h5>Connectez-vous. Pas encore inscrit ? <a href="./">inscrivez-vous</a>.</h5>
        </div>
        <div class="form-group">
          <input type="email" class="form-control item" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control item" name="password" placeholder="Mot de passe" required>
        </div>
        <button type="submit" class="btn btn-block btn-primary button-form">Se connecter</button>
      </form>
    </div>

  </main>
</body>

</html>