<?php
require './src/connexion.php';


if ((!empty($_POST["email"]) && !empty($_POST["password"]))) {
  $email = $_POST["email"];
  $password = hash('sha256', $_POST["password"]);
  $error = 1;


  $req = $bdd->prepare("SELECT * from users WHERE email = :email");
  $req->execute(array(
    "email" => $email
  ));

  while ($users = $req->fetch()) {
    if ($password == $users["password"]) {
      $error = 0;
      $_SESSION["fname"] = $users["fname"];
      $_SESSION["lname"] = $users["lname"];
      $_SESSION["email"] = $users["email"];
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