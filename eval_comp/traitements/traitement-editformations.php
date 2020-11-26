<?php

include('../config/pdo-connect.php');

// Verification si les données sont envoyés depuis un membre connecté sur le site et si ce membre est un Administrateur
if(isset($_SESSION['id']) && $infos['Administrateur'] == TRUE) {

    // Si le nom de la formation à ajouter existe:
    if(isset($_POST['Ajout'])) {
        
        // Si le nom de la formation à ajouter n'est pas vide:
        if(!empty($_POST['Ajout'])) {
        
            // Insertion de la formation dans la base de données
            $insertformation = $bdd->prepare('INSERT INTO Formations(FORMATION) VALUES(:formation)');
            $insertformation->bindParam(':formation', $_POST['Ajout'], PDO::PARAM_STR);
            $insertformation->execute();
            
            // Message de confirmation
            $feedback = "La formation a bien été ajoutée !";
            
        } else {
            
            $feedback = "Veuillez insérer le nom de la formation à ajouter !";
            
        }
    
    // Sinon vérification si le nom de la formation à supprimer existe
    } elseif(isset($_POST['Suppression'])) {
        
        // Vérification si le nom de la formation à supprimer n'est pas vide
        if(!empty($_POST['Suppression'])) {
            
            // Récupération de toutes les sessions de la formation qui doit être supprimée
            $allsessions = $bdd->prepare('SELECT ID_SESSION FROM Sessions WHERE ID_FORMATION = :formation');
            $allsessions->bindParam(':formation', $_POST['Suppression'], PDO::PARAM_INT);
            $allsessions->execute();
            // Comptage des résultats
            $countsessions = $allsessions->rowCount();
            // Si au moins 1 résultat est retournée:
            if($countsessions != 0) {
                
                // Recuperation du/des résultats et stockage dans une variable
                $sessionids = $allsessions->fetch();
                
            }
            
            // Si la variable des résultats n'est pas vide:
            if(!empty($sessionids)) {
                
                // Création d'une boucle pour chaque résultat
                foreach($sessionids as $session) {
                    
                    // Mise a jour de la session active des utilisateur qui fesaient partie d'une session de la formation qui sera supprimée, pour la mettre 0 (donc aucune formation ne sera active pour l'utilisateur sauf si il est invité dans une autre formation ou qu'il choissis une autre formation active sur leur profil parmis les sessions dans lesquels il est déjà stagiaire ou formateur)
                    $sessionactive = 0;
                    $updateUsersOptions = $bdd->prepare('UPDATE Options SET SESSION = :sessionactive WHERE SESSION = :session');
                    $updateUsersOptions->bindValue(':sessionactive', $sessionactive, PDO::PARAM_INT);
                    $updateUsersOptions->bindParam(':session', $session, PDO::PARAM_INT);
                    $updateUsersOptions->execute();
                    
                }
                
            }
            
            // Suppression de la formation dans la table des formations
            $deleteFormation = $bdd->prepare('DELETE FROM Formations WHERE ID_FORMATION = :formation');
            $deleteFormation->bindParam(':formation', $_POST['Suppression'], PDO::PARAM_INT);
            $deleteFormation->execute();
            
            // Suppression des sessions de formations associé à la formation
            $deleteSessions = $bdd->prepare('DELETE FROM Sessions WHERE ID_FORMATION = :formation');
            $deleteSessions->bindParam(':formation', $_POST['Suppression'], PDO::PARAM_INT);
            $deleteSessions->execute();
            
            // Suppression des inscriptions des sessions des utilisateurs liée à cette formation:
            $deleteSessionsUsers = $bdd->prepare('DELETE FROM FormationsUtilisateur WHERE IDENTIFIANT_FORMATION = :formation');
            $deleteSessionsUsers->bindParam(':formation', $_POST['Suppression'], PDO::PARAM_INT);
            $deleteSessionsUsers->execute();
            
            // Mise à jour des inscriptions temporaires pour les sessions de la formations qui est supprimée. Ainsi si les utilisateurs confirment leur inscriptions, leur compte sera créé mais il n'auront pas de session active.
            $updateInscriptions = $bdd->prepare('UPDATE Inscriptions SET SESSION_NUMBER = 0, ID_FORMATION = 0 WHERE ID_FORMATION = :formation');
            $updateInscriptions->bindParam(':formation', $_POST['Suppression'], PDO::PARAM_INT);
            $updateInscriptions->execute();
            
            // Suppression des invitation pour les sessions de la formation qui est supprimée
            $deleteInvitations = $bdd->prepare('DELETE FROM Invitations WHERE FormationID = :formation');
            $deleteInvitations->bindParam(':formation', $_POST['Suppression'], PDO::PARAM_INT);
            $deleteInvitations->execute();
            
            // Message de confirmation
            $feedback = "La formation et les sessions qui lui été associée ont bien été supprimées !";
            
        } else {
            
            $feedback = "Veuillez insérer le nom de la formation à supprimer !";
            
        }
        
    }
    
    // Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
    if(isset($feedback) && !empty($feedback)) {
        
        echo $feedback;
        
    }
    
}

?>