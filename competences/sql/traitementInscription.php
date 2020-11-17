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
  $req = $bdd->prepare("INSERT INTO users(fname, lname, email, password, role) VALUES(:fname, :lname, :email, :password, :role)");
  $req->execute(array(
  "lname" => $lname,
  "fname" => $fname,
  "email" => $email,
  "password" => $password,
  "role" => "stagiaire",
  ));

  // ON RECUPERE L'ID DE L'USER
  $req = $bdd->prepare("SELECT * FROM users WHERE email = :email");
  $req->execute(array(
  "email" => $email
  ));

  while ($users = $req->fetch()) {
    if ($password == $users["password"]) {
      $_SESSION["id_user"] = $users["id"];
    }
  }

  // ON RECUPERE LE NOMBRE DE COMPETNCES
  $req = $bdd->prepare("SELECT COUNT(*) as nb FROM competences");
  $req->execute();

  $nb_competences = $req->fetch(pdo::FETCH_ASSOC);
  $nb_competences = intval($nb_competences["nb"]);

  //ON INITIALISE lES EVALUATIONS A 0
  for ($i = 1; $i <= $nb_competences; $i++) { 
    $req=$bdd->prepare("INSERT INTO resultats(id_user, id_competence, evaluation) VALUES(:id_user, :id_competence, :evaluation)");
    $req->execute(array(
    "id_user" => $_SESSION["id_user"],
    "id_competence" => $i,
    "evaluation" => 0
    ));
    $req->closeCursor();
  }

  header('location: ./connexion.php?success=1');
  exit();
}
?>