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

?>