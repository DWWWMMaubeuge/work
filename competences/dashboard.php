<?php
session_start();
require 'displayMat.php';
require 'getNote.php';

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
  <title>Evaluation</title>
</head>

<body>
  <main class="container">
    <h1>Bonjour <?= $_SESSION["fname"] ?> !</h1>
    <p>Ceci est votre tableau de bord</p>

      <div class="row">

        <?php
        displayEval($matieres, $array, 0);
        ?>

      </div>

    <p><a href="deconnexion.php">Déconnexion</a></p>

  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js"></script>
</body>

</html>