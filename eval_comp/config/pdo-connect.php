<?php

session_start();

$servername = "localhost";
$username = "";
$password = "";

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

  $connectinfos = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Membres.ID = :id');
  $connectinfos->bindParam(':id', $_SESSION['id']);
  $connectinfos->execute();
  $infos = $connectinfos->fetch();

}

function dateConvert($date) {
    
    return (strftime('%d/%m/%Y ', strtotime($date)));
    
}

setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
$mois = strtoupper(strftime('%B', time()));

?>