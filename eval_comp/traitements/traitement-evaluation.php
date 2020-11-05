<?php

include('../config/pdo-connect.php');

if( $_GET['idSkill'] != "" && $_GET['valSkill'] != "") {

    GLOBAL $bdd;

    $idSkill = $_GET['idSkill'];
    $valSkill = $_GET['valSkill'];
    $ID_user = $_SESSION['id'];
    
    $q = $bdd->prepare('SELECT RESULTAT FROM Resultats WHERE ID_USER = ? AND ID_MATIERE = ?');
    $q->execute([$_SESSION['id'], $idSkill]);
    $count = $q->rowCount();
    if($count == 0) {

    $insert = $bdd->prepare('INSERT INTO Resultats ( ID_USER, ID_MATIERE, RESULTAT ) VALUES (:iduser, :idskill, :resultat)');

    } else {

        $insert = $bdd->prepare('UPDATE Resultats SET RESULTAT = :resultat WHERE ID_USER = :iduser AND ID_MATIERE = :idskill');

    }

    $insert->bindParam(':iduser', $ID_user, PDO::PARAM_INT);
    $insert->bindParam(':idskill', $idSkill, PDO::PARAM_INT);
    $insert->bindParam(':resultat', $valSkill, PDO::PARAM_INT);
    $insert->execute();

}


?>