<?php

include('../config/pdo-connect.php');

// Verification si les données sont envoyés depuis un membre connecté sur le site
if(isset($_SESSION['id'])) {
    
    // Si toutes les données nécessaires au traitement sont présentes:
    if(isset($_POST['Email']) && !empty($_POST['Email']) && isset($_POST['Confirmation']) && isset($_POST['Captcha']) && isset($_POST['Idformation']) && isset($_POST['Idsession'])) {
        
        // Stockage du captcha entrée par l'utilisateur dans une variable
        $captcha = $_POST['Captcha'];
        
        // Si le captcha entrée par l'utilisateur correspond à celui qui a été généré, alors la fonction s'execute
        if($captcha == $_SESSION['captcha']) {
            
            // Stockage des données du formulaire dans des variables
            $email = $_POST['Email'];
            $idFormation = $_POST['Idformation'];
            $idSession = $_POST['Idsession'];
            $confirmation = $_POST['Confirmation'];
            
            // Si l'utilisateur accepte l'invitation:
            if($_POST['Confirmation'] == "Oui") {
                
                // Insertion de sa nouvelle session formation dans la table des formations utilisateurs
                $insernewuserformation = $bdd->prepare('INSERT INTO FormationsUtilisateur(USER, IDENTIFIANT_FORMATION, IDENTIFIANT_SESSION) VALUES(:User, :Formation, :Session)');
                $insernewuserformation->bindParam(':User', $_SESSION['id'], PDO::PARAM_INT);
                $insernewuserformation->bindParam(':Formation', $idFormation, PDO::PARAM_INT);
                $insernewuserformation->bindParam(':Session', $idSession, PDO::PARAM_INT);
                $insernewuserformation->execute();
                
                // Mise à jour de sa formation et sa session active dans ses options
                $setformation = $bdd->prepare('UPDATE Options SET SESSION = :Session WHERE ID in (select m.id from Membres m where m.email = :Email) ');
                $setformation->bindParam(':Session', $idSession, PDO::PARAM_INT);
                $setformation->bindParam(':Email', $email, PDO::PARAM_STR);
                $setformation->execute();
                
                // Suppression de l'invitation
                $deleteinvitation = $bdd->prepare('DELETE FROM Invitations WHERE Email = :email');
                $deleteinvitation->bindParam(':email', $email, PDO::PARAM_STR);
                $deleteinvitation->execute();
                
                // Message de confirmation
                $feedback = "Votre choix a bien été pris en compte ! Vous allez être redirigé vers votre profil";
            
            // Si l'utilisateur décline l'invitation:    
            } else {
                
                // Suppression de l'invitation
                $sql = $bdd->prepare('DELETE FROM Invitations WHERE Email = :Email');
                $sql->bindParam('Email', $email, PDO::PARAM_STR);
                $sql->execute();
                
                // Message de confirmation
                $feedback = "Votre choix a bien été pris en compte ! Vous allez être redirigé vers votre profil";
                
            }
            
        } else {
            
            // Message d'erreur si le captcha entré par l'utilisateur ne correspond pas à celui généré
            $feedback = "Le code captcha entrée ne correspond pas à celui de l'image !";
            
        }
    
    } else {
        
        // Message d'erreur si l'utilisateur ne remplis pas touts les champs
        $feedback = "Veuillez remplir touts les champs !";
        
    }
    
    // Si un message d'erreur ou de confirmation existe et si il n'est pas vide, on l'affiche
    if(isset($feedback) && !empty($feedback)) {
        
        echo $feedback;
        
    }
    
}