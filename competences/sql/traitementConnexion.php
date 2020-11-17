<?php
require './src/connexion.php';


if (!empty($_POST["email"]) && !empty($_POST["password"]) && isset($_POST["captcha"])) {
  if ($_POST["captcha"] == $_SESSION["captcha"]) {
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
        $_SESSION["id_formation"] = $users["id_formation"];
        $_SESSION["role"] = $users["role"];

        $_SESSION["note"] = 0;

        if($_SESSION["role"] == "stagiaire") {
          header('Location: ./dashboard.php');
          exit();
        } elseif($_SESSION["role"] == "admin") {
          header('Location: ./dashboardSU.php');
          exit();
        }
        
      }
    }

    if ($error == 1) {
      header('Location: ./connexion.php?error=1');
      exit();
    }
  }

  header('Location: ./connexion.php?captcha=1');
  exit();
  
}
?>