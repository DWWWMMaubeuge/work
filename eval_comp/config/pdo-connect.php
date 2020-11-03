<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "admin";

GLOBAL $bdd;
GLOBAL $infos;

try {
  $bdd = new PDO("mysql:host=$servername;dbname=DWM_Maubeuge", $username, $password);
} catch(PDOException $e) {
    echo $e->getMessage();
}

if(isset($_SESSION['id'])) {

  $q = $bdd->prepare('SELECT * FROM Membres WHERE ID = :id');
  $q->bindParam(':id', $_SESSION['id']);
  $q->execute();
  $infos = $q->fetch();

}

?>