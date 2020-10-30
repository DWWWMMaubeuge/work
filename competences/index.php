<?php

require 'src/connexion.php';

if(!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["password"]) && !empty($_POST["password_confirm"]) ) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $password = $_POST["password"];
  $password_confirm = $_POST["password_confirm"];

  // On test le password
  if ($password != $password_confirm) {
    header("location: ./?error=1&pass=1");
    exit();
  }

  // On test si le prénom et nom sont déjà utilisés
  $req = $bdd->prepare("SELECT COUNT(*) as numberName FROM users WHERE lname = :lname AND fname = :fname");
  $req->execute(array(
    "lname" => $lname,
    "fname" => $fname
  ));

  while($name_verification = $req->fetch()) {
    if($name_verification["numberName"] != 0) {
      header("location: ./?error=1&name=1");
      exit();
    }
  }

  // CRYPTAGE DU PASSWORD
  $password =  hash('sha256', $password);

  // Envoie de la requête
  $req = $bdd->prepare("INSERT INTO users(fname, lname, password) VALUES(:fname, :lname, :password)");
  $req->execute(array(
    "lname" => $lname,
    "fname" => $fname,
    "password" => $password,
  ));

  header('location: ./connexion.php?success=1');
  exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Accueil</title>
</head>

<body>
  <main class="container">
    <h1>Inscription</h1>

    <p>Bienvenue ! Pour en voir plus, inscrivez-vous, sinon <a href="connexion.php">connectez-vous</a>.</p>

    <?php if(isset($_GET["error"])): ?>
      <?php if(isset($_GET["pass"])): ?>
          <div class="alert alert-danger">
            Les mots de passes sont différents
          </div>
      <?php elseif(isset($_GET["name"])): ?>
          <div class="alert alert-danger">
            Un homonyme existe déjà
          </div>
      <?php endif; ?>
    <?php endif; ?>
  

    <form action="" method="POST">
      <div class="form-group">
        <input type="text" class="form-control" name="fname" placeholder="Prénom de l'utilisateur" required>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="lname" placeholder="Nom de l'utilisateur" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="password_confirm" placeholder="Confirmer Mot de passe" required>
      </div>
      <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>

  </main>

</body>

</html>