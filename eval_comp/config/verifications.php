<?php 

function userIsLogged() {

  if(!isset($_SESSION['id'])) {

    header('location: index.php');
    exit();

  }

}

function userIsNotLogged() {

  if(isset($_SESSION['id'])) {

    header('location: index.php');
    exit();

  }

}

function userIsAdmin() {

  GLOBAL $infos;

  if($infos['Admin'] != TRUE) {

    header('Location: index.php');
    exit();

  }

}

function checkAdminForComps() {

  GLOBAL $infos;

  if($infos['Admin'] == TRUE) {

    return "<div class='alert alert-primary w-50 text-center mx-auto' role='alert'><a class='nav-link' href='edit-evaluation.php'>Editer l'évaluation</a></div>";

  }

}

function checkForActivation() {

  GLOBAL $bdd;

  if(!isset($_GET['account']) or empty($_GET['account'])) {

    header('location: index.php');
    exit();

  }

  $secure_key = $_GET['account'];

  $q = $bdd->prepare('SELECT EMAIL FROM Inscriptions WHERE SECURE_KEY = :key');
  $q->bindParam(':key', $secure_key, PDO::PARAM_INT);
  $q->execute();
  $count = $q->rowCount();
  if($count == 0) {

    header('location: index.php');
    exit();

  }


}

?>