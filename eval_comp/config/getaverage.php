<?php



function getAverage($user, $formation) {

    GLOBAL $bdd;

    $sql = $bdd->prepare('SELECT SUM(RESULTAT) FROM Resultats WHERE ID_USER = :user GROUP BY MOIS');
    $sql->bindParam(':user', $user, PDO::PARAM_INT);
    $sql->execute();

    $req = $bdd->prepare('SELECT COUNT(Active) FROM Matieres WHERE ID_Formation = :userformation');
    $req->bindParam(':userformation', $formation, PDO::PARAM_INT);
    $req->execute();

    $resultats = $sql->fetchAll();

    $matieres = $req->fetch();

    $moyennes = array(

    );

    foreach($resultats as $result) {

    $moyenne = $result[0] / $matieres['COUNT(Active)'];
    $moyenne = number_format($moyenne, 2);
    array_push($moyennes, $moyenne);

    }

    return $moyennes;

}

?>