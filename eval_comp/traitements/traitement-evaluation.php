<?php

include('../config/pdo-connect.php');

if( $_GET['idSkill'] != "" && $_GET['valSkill'] != "") {

    GLOBAL $bdd;
    setlocale (LC_TIME, 'fr_FR.utf8','fra'); 
    $mois = strtoupper(strftime('%B', time()));
    $moisInsertion = substr($mois, 0, 3);
    $idSkill = $_GET['idSkill'];
    $valSkill = $_GET['valSkill'];
    $formation = $_GET['formation'];
    $ID_user = $_SESSION['id'];

    $q = $bdd->prepare('SELECT RESULTAT FROM Resultats WHERE ID_USER = :iduser AND ID_MATIERE = :idskill AND FORMATION = :formation AND MOIS = :mois');
    $q->bindParam(':iduser', $ID_user, PDO::PARAM_INT);
    $q->bindParam(':idskill', $idSkill, PDO::PARAM_INT);
    $q->bindParam(':formation', $formation, PDO::PARAM_INT);
    $q->bindParam(':mois', $moisInsertion, PDO::PARAM_STR);
    $q->execute();
    $count = $q->rowCount();
    if($count == 0) {

    $insert = $bdd->prepare('INSERT INTO Resultats ( ID_USER, ID_MATIERE, FORMATION, RESULTAT, MOIS) VALUES (:iduser, :idskill, :formation, :resultat, :mois)');

    } else {

        $insert = $bdd->prepare('UPDATE Resultats SET RESULTAT = :resultat WHERE ID_USER = :iduser AND ID_MATIERE = :idskill AND FORMATION = :formation AND MOIS = :mois');

    } 

    $insert->bindParam(':iduser', $ID_user, PDO::PARAM_INT);
    $insert->bindParam(':idskill', $idSkill, PDO::PARAM_INT);
    $insert->bindParam(':formation', $formation, PDO::PARAM_INT);
    $insert->bindParam(':resultat', $valSkill, PDO::PARAM_INT);
    $insert->bindParam(':mois', $moisInsertion, PDO::PARAM_STR);
    $insert->execute();


}


?>