<?php
session_start();
require 'sql/traitementInscription.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Inscription</title>
</head>

<body>
  <main class="container">

    <div class="registration-form">

      <?php if (isset($_GET["error"])) : ?>
        <?php if (isset($_GET["pass"])) : ?>
          <div class="alert alert-danger item mx-auto">
            Les mots de passes sont différents
          </div>
        <?php elseif (isset($_GET["name"])) : ?>
          <div class="alert alert-danger item mx-auto">
            Un homonyme existe déjà
          </div>
        <?php endif; ?>
      <?php endif; ?>

      <form action="#" method="POST">
        <div class="form-title">
          <h5>Inscrivez-vous. Déjà membre ? <a href="connexion.php">Connectez-vous</a>.</h5>
        </div>
        <div class="form-group">
          <input type="text" class="form-control item" name="fname" placeholder="Prénom" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control item" name="lname" placeholder="Nom" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control item" name="password" placeholder="Mot de passe" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control item" name="password_confirm" placeholder="Confirmer le mot de passe" required>
        </div>
        <button type="submit" class="btn btn-block btn-primary button-form">S'inscrire</button>
      </form>
    </div>

  </main>

</body>

</html>