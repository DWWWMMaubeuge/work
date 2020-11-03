<?php
session_start();
include 'displayMat.php';
include 'getNote.php';

if (!isset($_SESSION["fname"])) {
  header("location: ./");
  exit();
}

$req = $bdd->prepare("SELECT r.id_matiere, m.mat, r.note, r.datex
                        FROM matieres as m
                        INNER JOIN resultats as r
                        ON m.id = r.id_matiere
                        GROUP BY r.id_matiere");
$req->execute();

$array = $req->fetchAll(PDO::FETCH_ASSOC);

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
    <form action="#" method="POST">

      <?php
      displayEval($matieres);
      ?>

    </form>

    <input type="hidden" id=varToPass value=<?= json_encode($array); ?>>

    <p><a href="deconnexion.php">Déconnexion</a></p>

  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="script.js" type="text/javascript"></script>
</body>

</html>