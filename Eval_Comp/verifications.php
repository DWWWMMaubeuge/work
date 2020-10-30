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

?>