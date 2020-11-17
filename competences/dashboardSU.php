<?php
session_start();
require 'navBar.php';
require 'superUser/navSU.php';

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
  <title>Dashboard</title>
</head>

<body>

  <?= $nav = navBar(); ?>



  <main class="container board">

    <?php if (isset($_GET["success"])) : ?>

      <div class="alert alert-success">
        Formation ajoutée avec succès
      </div>
    <?php endif; ?>

    <div class="row">

      <div class="col-12 board-title2">

        <h5>Bienvenue sur votre tableau de bord <?= ucfirst($_SESSION["fname"]) ?> !</h5>

      </div>

    </div>

    <div class="row">

      <div class="col-xs-12 col-md-5 board-title2">

        <?= dashSU(); ?>

      </div>

      <div class="col-xs-12 col-md-7 d-flex align-items-center justify-content-center" id="display">

      </div>

    </div>

    <div class="row">

      <p class="col-12 text-right"><a href="./deconnexion.php">Déconnexion</a></p>

    </div>

  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<<<<<<< HEAD
<<<<<<< HEAD
=======
  <script src="js/dashSU.js"></script>
>>>>>>> 49803271f7874ef09e9d87cc2fe4c1665cdf2784
=======
  <script src="js/dashSU.js"></script>
>>>>>>> 49803271f7874ef09e9d87cc2fe4c1665cdf2784
</body>

</html>