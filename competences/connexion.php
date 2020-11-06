<?php
require 'src/connexion.php';
session_start();

if ((!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["password"]))) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $password = hash('sha256', $_POST["password"]);
  $error = 1;


  $req = $bdd->prepare("SELECT * from users WHERE fname = :fname AND lname = :lname");
  $req->execute(array(
    "lname" => $lname,
    "fname" => $fname
  ));

  while ($users = $req->fetch()) {
    if ($password == $users["password"]) {
      $error = 0;
      $_SESSION["fname"] = $users["fname"];
      $_SESSION["lname"] = $users["lname"];
      $_SESSION["id_user"] = $users["id"];
      $_SESSION["note"] = 0;

      header('Location: ./dashboard.php');
      exit();
    }
  }

  if ($error == 1) {
    header('Location: ./connexion.php?error=1');
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/style.css">
  <title>Connexion</title>
</head>

<body>
  <main class="container">
    <?php if (isset($_GET["error"])) : ?>
      <div class="alert alert-danger">
        Utilisateur Inconnu
      </div>
    <?php elseif (isset($_GET["success"])) : ?>
      <div class="alert alert-success">
        Utilisateur ajouté
      </div>
    <?php endif; ?>

    <div class="registration-form">
      <form action="#" method="POST">
        <div class="form-title">
          <h5>Connectez-vous ! Pas encore inscrit ? <a href="./">inscrivez-vous</a>.</h5>
        </div>
        <div class="form-group">
          <input type="text" class="form-control item" name="fname" placeholder="Prénom de l'utilisateur" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control item" name="lname" placeholder="Nom de l'utilisateur" required>
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