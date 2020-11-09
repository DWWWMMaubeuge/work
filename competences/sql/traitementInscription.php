<?php
require './src/connexion.php';

if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_confirm"])) {
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_confirm = $_POST["password_confirm"];

// On test le password
if ($password != $password_confirm) {
header("location: ./?error=1&pass=1");
exit();
}

// On test si le prénom et nom sont déjà utilisés
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

// Envoie de la requête
$req = $bdd->prepare("INSERT INTO users(fname, lname, email, password) VALUES(:fname, :lname, :email, :password)");
$req->execute(array(
"lname" => $lname,
"fname" => $fname,
"email" => $email,
"password" => $password,
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

// ON RECUPERE LE NOMBRE DE MATIERES
$req = $bdd->prepare("SELECT COUNT(*) as nb FROM matieres");
$req->execute();

$nb_matieres = $req->fetch(pdo::FETCH_ASSOC);
$nb_matieres = intval($nb_matieres["nb"]);

//ON INITIALISE lES NOTES A 0
for ($i = 1; $i <= $nb_matieres; $i++) { 
  $req=$bdd->prepare("INSERT INTO resultats(id_user, id_matiere, note) VALUES(:id_user, :id_matiere, :note)");
  $req->execute(array(
  "id_user" => $_SESSION["id_user"],
  "id_matiere" => $i,
  "note" => 0
  ));
  $req->closeCursor();
  }

  header('location: ./connexion.php?success=1');
  exit();
  }
  ?>