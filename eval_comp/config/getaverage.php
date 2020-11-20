<?php



function getAverage($user, $formation, $session) {

    GLOBAL $bdd;

    $allresultats = $bdd->prepare('SELECT SUM(RESULTAT) FROM Resultats WHERE ID_USER = :user AND ID_SESSION = :session GROUP BY MOIS');
    $allresultats->bindParam(':user', $user, PDO::PARAM_INT);
    $allresultats->bindParam(':session', $session, PDO::PARAM_INT);
    $allresultats->execute();

    $allmatieres = $bdd->prepare('SELECT COUNT(Active) FROM Matieres WHERE ID_Formation = :userformation');
    $allmatieres->bindParam(':userformation', $formation, PDO::PARAM_INT);
    $allmatieres->execute();

    $matieres = $allmatieres->fetch();

    $moyennes = array(

    );

    while($resultats = $allresultats->fetch()) {

    $moyenne = $resultats[0] / $matieres['COUNT(Active)'];
    $moyenne = number_format($moyenne, 2);
    array_push($moyennes, $moyenne);

    }

    return $moyennes;

}

?>