<?php

if(isset($_SESSION['id'])) {

    function getAverage($user, $session) {
    
        GLOBAL $bdd;
        
        // Récupération du total des résultats des compétences actives pour la session de formation active de l'utilisateur.
        $allresultats = $bdd->prepare('SELECT SUM(RESULTAT) FROM Resultats LEFT JOIN Matieres ON Resultats.ID_MATIERE = Matieres.id WHERE Matieres.Active = TRUE AND Resultats.ID_USER = :user AND Resultats.ID_SESSION = :session GROUP BY MOIS');
        $allresultats->bindParam(':user', $user, PDO::PARAM_INT);
        $allresultats->bindParam(':session', $session, PDO::PARAM_INT);
        $allresultats->execute();
        
        // Récupération du total des compétences actives de la session de formation de l'utilisateur
        $allmatieres = $bdd->prepare('SELECT COUNT(Active) FROM Matieres WHERE ID_Session = :usersession AND Active = TRUE');
        $allmatieres->bindParam(':usersession', $session, PDO::PARAM_INT);
        $allmatieres->execute();
    
        $matieres = $allmatieres->fetch();
        
        // Création d'un tableau des moyennes qui est vide pour le moment
        $moyennes = array(
    
        );
    
        while($resultats = $allresultats->fetch()) {
            
            
            if($matieres['COUNT(Active)'] != 0) {
                
                // Calcul de la moyenne / total de compétence active.
                $moyenne = $resultats[0] / $matieres['COUNT(Active)'];
                // Arrondissement du résultat à deux chiffres après la virgule
                $moyenne = number_format($moyenne, 2);
                // Insertion de la moyennes dans le tableau des moyennes
                array_push($moyennes, $moyenne);
                
            }
    
        }
        
        // On renvoie le tableau des moyennes qui sera utilisée dans une autre fonction (moyennes.php)
        return $moyennes;
    
    }
    
}

?>