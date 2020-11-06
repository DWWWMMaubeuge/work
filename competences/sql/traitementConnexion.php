<?php
require './src/connexion.php';


if ((!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["password"]))) {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $password = hash('sha256', $_POST["password"]);
  $error = 1;


  $req = $bdd->prepare("SELECT * from users WHERE fname = :fname AND lname = :lname");
  $req->execute(array(
    "lname" => $lname,
    "fname" => $fname
  ));

  while ($users = $req->fetch()) {
    if ($password == $users["password"]) {
      $error = 0;
      $_SESSION["fname"] = $users["fname"];
      $_SESSION["lname"] = $users["lname"];
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