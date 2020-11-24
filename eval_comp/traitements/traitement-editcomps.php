<?php

include('../config/pdo-connect.php');

// Verification si les données sont envoyés depuis un membre connecté sur le site et si ce membre est un SuperAdmin
if(isset($_SESSION['id']) && $infos['Admin'] == TRUE) {

    if(isset($_POST['ON'])) {
    
        if(!empty($_POST['ON'])) {
            // Récupération et stockage des données du formulaire dans des variables
            $session = $_POST['SESSION'];
            $nom = $_POST['ON'];
            $active = 1;
        
            // Mise a jour de la compétence à activer dans la base de données
            $activatecomp = $bdd->prepare('UPDATE Matieres SET Active = :active WHERE Nom = :nom AND ID_Session = :session');
            $activatecomp->bindParam(':nom', $nom, PDO::PARAM_STR);
            $activatecomp->bindParam(':session', $session, PDO::PARAM_INT);
            $activatecomp->bindParam(':active', $active, PDO::PARAM_BOOL);
            $activatecomp->execute();
            
            // Message de confirmation
            $feedback = "Compétence mise à jour !";
    
        } else {
            
            // Message d'erreur si aucune compétence à activer n'a été choisie mais que le formulaire a été envoyé
            $feedback = "Aucune compétence à activer";
    
        }
    
    }
    
    if(isset($_POST['OFF'])) {
    
        if(!empty($_POST['OFF'])) {
            
            // Récupération et stockage des données du formulaire dans des variables
            $nom = $_POST['OFF'];
            $session = $_POST['SESSION'];
            $active = 0;
            
            // Mise à jour de la compétence à désactiver dans la base de données
            $desactivercomp = $bdd->prepare('UPDATE Matieres SET Active = :active WHERE Nom = :nom AND ID_Session = :session');
            $desactivercomp->bindParam(':nom', $nom, PDO::PARAM_STR);
            $desactivercomp->bindParam(':session', $session, PDO::PARAM_INT);
            $desactivercomp->bindParam(':active', $active, PDO::PARAM_BOOL);
            $desactivercomp->execute();
            
            // Message de confirmation
            $feedback = "Compétence mise à jour !";
    
        } else {
            
            // Message d'erreur si aucune compétence à activer n'a été choisie mais que le formulaire a été envoyé
            $feedback = "Aucune compétence à désactiver !";
    
        }
    
    }
    
    if(isset($_POST['ADD'])) {
        
        // Récupération et stockage des données du formulaire dans des variables
        $nom = htmlspecialchars($_POST['ADD']);
        $formation = htmlspecialchars($_POST['FORMATION']);
        $session = $_POST['SESSION'];
        
        if(!empty($formation)) {
            
            // Insertion de la nouvelle compétence
            $ajoutercomp = $bdd->prepare('INSERT INTO Matieres(Nom, Active, ID_Formation, ID_Session) VALUES(:nom, :active, :formation, :session)');
            $ajoutercomp->bindParam(':nom', $nom, PDO::PARAM_STR);
            $ajoutercomp->bindParam(':session', $session, PDO::PARAM_INT);
            $ajoutercomp->bindParam(':formation', $formation, PDO::PARAM_STR);
            
            // Si la compétence doit être activé de base, on crée une variable $active et on la définit à 1 (True)
            if($_POST['ACTIVE'] == 'Oui') {
    
                $active = 1;
            // Sinon on crée une variable $active et on la définit à 0 (False)
            } else {
                
                $active = 0;
    
            }
            
            // On ajoute le paramètre et on execute la requête d'insertion
            $ajoutercomp->bindParam(':active', $active, PDO::PARAM_BOOL);
            $ajoutercomp->execute();
            
            // Message de confirmation
            $feedback = "Compétence ajoutée !";
            
        } else {
            
            // Message d'erreur si aucune formation lié à la compétence n'est choisie
            $feedback = "Veuillez choisir la formation lié à cette compétence !";
            
        }
    
    }
    
    if(isset($_POST['DEBUT']) && isset($_POST['FIN']) && isset($_POST['FORMATION'])) {
        
        // Mise à jour des dates de la session de formation
        $changerdates = $bdd->prepare('UPDATE Sessions SET DATE_DEBUT = :debut, DATE_FIN = :fin WHERE ID_FORMATION = :formation AND ID_SESSION = :session');
        $changerdates->bindParam(':debut', $_POST['DEBUT'], PDO::PARAM_STR);
        $changerdates->bindParam(':fin', $_POST['FIN'], PDO::PARAM_STR);
        $changerdates->bindParam(':formation', $_POST['FORMATION'], PDO::PARAM_INT);
        $changerdates->bindParam(':session', $_POST['SESSION'], PDO::PARAM_INT);
        $changerdates->execute();
        
        // Message de confirmation
        $feedback = "Les dates ont été mises à jour !";
        
    }
    
    // Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
    if(isset($feedback) && !empty($feedback)) {
    
        echo $feedback;
    
    }
    
}

?>