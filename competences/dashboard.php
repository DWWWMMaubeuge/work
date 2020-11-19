<?php
session_start();
require 'displayMat.php';
require 'navBar.php';

if (!isset($_SESSION["fname"])) {
  header("location: ./");
  exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="css/dashboard.css">
  <title>Evaluation</title>
</head>

<body>

  <?= $nav = navBar(); ?>

  <main class="container">

    <div class="row board">

      <div class="col-12 board-title">
        <h5>Bonjour <?= ucfirst($_SESSION["fname"]) ?> !</h5>
        <p>Ceci est votre tableau d'évaluation</p>
      </div>

      <?php
      displayEval($matieres, $array);
      ?>

      <p class="col-12 text-right"><a href="deconnexion.php">Déconnexion</a></p>

    </div>

  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>
</body>
</html>