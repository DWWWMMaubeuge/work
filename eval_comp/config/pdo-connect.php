<?php

session_start();

$servername = "localhost";
$username = "id15316558_theevilfox";
$password = "@59199Hergnies";

GLOBAL $bdd;
GLOBAL $infos;

try {

  $bdd = new PDO("mysql:host=$servername;dbname=id15316558_dwm_maubeuge", $username, $password);
  $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {

    echo $e->getMessage();
    
}

if(isset($_SESSION['id'])) {

  $q = $bdd->prepare('SELECT * FROM Membres JOIN Visibilitée ON Membres.ID = Visibilitée.ID WHERE Membres.ID = :id');
  $q->bindParam(':id', $_SESSION['id']);
  $q->execute();
  $infos = $q->fetch();

}

?>