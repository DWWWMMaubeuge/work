<?php
require './src/connexion.php';

if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["password"]) && !empty($_POST["password_confirm"])) {
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

while ($name_verification = $req->fetch()) {
if ($name_verification["numberName"] != 0) {
header("location: ./?error=1&name=1");
exit();
}
}

// CRYPTAGE DU PASSWORD
$password = hash('sha256', $password);

// Envoie de la requête
$req = $bdd->prepare("INSERT INTO users(fname, lname, password) VALUES(:fname, :lname, :password)");
$req->execute(array(
"lname" => $lname,
"fname" => $fname,
"password" => $password,
));

// ON RECUPERE L'ID DE L'SER
$req = $bdd->prepare("SELECT * FROM users WHERE fname = :fname AND lname = :lname");
$req->execute(array(
"lname" => $lname,
"fname" => $fname
));

while ($users = $req->fetch()) {
if ($password == $users["password"]) {
$_SESSION["id_user"] = $users["id"];
}
}

//ON INITIALISE lES NOTES A 0
for ($i = 1; $i <= 16; $i++) { $req=$bdd->prepare("INSERT INTO resultats(id_user, id_matiere, note) VALUES(:id_user, :id_matiere, :note)");
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