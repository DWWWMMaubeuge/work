<?php

session_start();

// Infos de connexion à la bdd

$servername = "localhost";
$username = "";
$password = "";

GLOBAL $bdd;
GLOBAL $infos;

// Essai de connexion à la base de données
try {

  $bdd = new PDO("mysql:host=$servername;dbname=id15316558_dwm_maubeuge", $username, $password);
  $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Capture et affichage de l'erreur si elle existe
} catch(PDOException $e) {

    echo $e->getMessage();
    
}

// Verification si l'utilisateur c'est connecter à son compte sur le site et récupération de ses infos si c'est le cas

if(isset($_SESSION['id'])) {

  $connectinfos = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN Sessions ON Options.SESSION = Sessions.ID_SESSION LEFT JOIN Formations ON Sessions.ID_FORMATION = Formations.ID_FORMATION WHERE Membres.ID = :id');
  $connectinfos->bindParam(':id', $_SESSION['id']);
  $connectinfos->execute();
  $infos = $connectinfos->fetch();

}

// Conversion d'une date passé en paramètre au format français

function dateConvert($date) {
    
    return (strftime('%d/%m/%Y ', strtotime($date)));
    
}

// Réglage du fuseau horaire et du jeu de caractères

setlocale (LC_TIME, 'fr_FR.utf8','fra'); 

// On stocke le mois courant dans une variable qui sera réutilisée plus tard sur différentes pages en tant que parametres (moyennes, auto-evaluation, ...)

$mois = strtoupper(strftime('%B', time()));

?>