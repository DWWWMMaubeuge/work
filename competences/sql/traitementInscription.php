<?php
require './src/connexion.php';

if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_confirm"])) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password_confirm = $_POST["password_confirm"];

  // ON TEST LE PASSWORD EST LE MEME
  if ($password != $password_confirm) {
    header("location: ./?error=1&pass=1");
    exit();
  }

  // ON TEST SI L'EMAIL EST DEJA UTILISE
  $req = $bdd->prepare("SELECT COUNT(*) as numberEmail FROM users WHERE email = :email");
  $req->execute(array(
  "email" => $email
  ));

  while ($email_verification = $req->fetch()) {
    if ($email_verification["numberEmail"] != 0) {
      header("location: ./?error=1&email=1");
      exit();
    }
  }

  // CRYPTAGE DU PASSWORD
  $password = hash('sha256', $password);

  // ON INSERT L'USER DANS LA BDD
  $req = $bdd->prepare("INSERT INTO users(fname, lname, email, password, role, id_formation) VALUES(:fname, :lname, :email, :password, :role, :id_formation)");
  $req->execute(array(
  "lname" => $lname,
  "fname" => $fname,
  "email" => $email,
  "password" => $password,
  "role" => "stagiaire",
  "id_formation" => 2
  ));

  // ON RECUPERE L'ID DE L'USER
  $req = $bdd->prepare("SELECT * FROM users WHERE email = :email");
  $req->execute(array(
  "email" => $email
  ));

  while ($users = $req->fetch()) {
    if ($password == $users["password"]) {
      $_SESSION["id_user"] = $users["id"];
      $_SESSION["id_formation"] = $users["id_formation"];
    }
  }

  // ON RECUPERE LE NOMBRE DE COMPETNCES
  $req = $bdd->prepare("SELECT * FROM competences WHERE id_formation = :id_formation");
  $req->execute(array(
    "id_formation" => $_SESSION["id_formation"]
  ));

  $nb_competences = $req->fetchAll(PDO::FETCH_ASSOC);
  //$nb_competences = intval($nb_competences["nb"]);

  //ON INITIALISE lES EVALUATIONS A 0
  foreach ($nb_competences as $competence) { 
    $req=$bdd->prepare("INSERT INTO resultats(id_user, id_competence, evaluation, id_formation) VALUES(:id_user, :id_competence, :evaluation, :id_formation)");
    $req->execute(array(
    "id_user" => $_SESSION["id_user"],
    "id_competence" => $competence["id"],
    "evaluation" => 0,
    "id_formation" => $_SESSION["id_formation"]
    ));
    $req->closeCursor();
  }

  header('location: ./connexion.php?success=1');
  exit();
}
?>