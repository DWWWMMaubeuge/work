<?php

include('../config/pdo-connect.php');

if( $_GET['idSkill'] != "" && $_GET['valSkill'] != "") {

    GLOBAL $bdd;
    
    // On récupère les 3 premières lettres du mois en cours pour l'ajout da,s la table des résultats
    $moisInsertion = substr($mois, 0, 3);
    // On récupère le reste des paramètres à insérer dans la table des résultats
    $idSkill = $_GET['idSkill'];
    $valSkill = $_GET['valSkill'];
    $formation = $_GET['formation'];
    $ID_user = $_SESSION['id'];
    $session = $_GET['session'];
    
    // Selection des résultats dans la table résultats selon les paramètres passées
    $selectresultexist = $bdd->prepare('SELECT RESULTAT FROM Resultats WHERE ID_USER = :iduser AND ID_MATIERE = :idskill AND FORMATION = :formation AND ID_SESSION = :session AND MOIS = :mois');
    $selectresultexist->bindParam(':iduser', $ID_user, PDO::PARAM_INT);
    $selectresultexist->bindParam(':idskill', $idSkill, PDO::PARAM_INT);
    $selectresultexist->bindParam(':formation', $formation, PDO::PARAM_INT);
    $selectresultexist->bindParam(':session', $session, PDO::PARAM_INT);
    $selectresultexist->bindParam(':mois', $moisInsertion, PDO::PARAM_STR);
    $selectresultexist->execute();
    // Comptage du nombre de résultats
    $count = $selectresultexist->rowCount();
    if($count == 0) {
    
        // Si aucun résultat n'est retourné alors on effectue on requète d'insertion
        $insert = $bdd->prepare('INSERT INTO Resultats ( ID_USER, ID_MATIERE, FORMATION, ID_SESSION, RESULTAT, MOIS) VALUES (:iduser, :idskill, :formation, :session, :resultat, :mois)');

    } else {
        
        // Sinon on effectue on requête de mise à jour
        $insert = $bdd->prepare('UPDATE Resultats SET RESULTAT = :resultat WHERE ID_USER = :iduser AND ID_MATIERE = :idskill AND FORMATION = :formation AND ID_SESSION = :session AND MOIS = :mois');

    } 
    
    // On bind touts les paramètres pour l'insertion ou la mise à jour et on execute la requête
    $insert->bindParam(':iduser', $ID_user, PDO::PARAM_INT);
    $insert->bindParam(':idskill', $idSkill, PDO::PARAM_INT);
    $insert->bindParam(':formation', $formation, PDO::PARAM_INT);
    $insert->bindParam(':session', $session, PDO::PARAM_INT);
    $insert->bindParam(':resultat', $valSkill, PDO::PARAM_INT);
    $insert->bindParam(':mois', $moisInsertion, PDO::PARAM_STR);
    $insert->execute();


}


?>