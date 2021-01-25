<?php

include('../config/pdo-connect.php');

if(isset($_POST['Pseudo']) && isset($_POST['Password']) && isset($_POST['Email']) && isset($_POST['Captcha']) && isset($_POST['Formation'])) {
    
    // Stockage de la copie du captcha entrée par l'utilisateur
    $captcha = $_POST['Captcha'];
    
    // Si le capatcha entrée est identique à celui qui est stocké dans la superglobale session la condition s'execute
    if($captcha == $_SESSION['captcha']) {
        
        // Stockage des données reçues du formulaire dans des variables
        $pseudo = $_POST['Pseudo'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $formation = $_POST['Formation'];
        $session = $_POST['Session'];
        
        // Stockage du nombre de caractères du pseudo et du mot de passe dans des variables
        $pseudolength = strlen($pseudo);
        $mdplength = strlen($password);
        
        // Selection des détails d'un membre selon l'adresse e-mail récupérée
        $selectmembrebyemail = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
        $selectmembrebyemail->bindParam(':email', $email, PDO::PARAM_STR);
        $selectmembrebyemail->execute();
        $verif = $selectmembrebyemail->rowCount();
        
        // Si le membre n'existe pas, la fonction continue de s'exécuter
        if($verif == 0) {
            
            // Si le pseudo est supérieur ou égal à 4 caractères, la fonction continue de s'exécuter
            if($pseudolength >= 4) {
                
                // Si le pseudo est inférieur ou égal à 20 caractères, la fonction continue de s'exécuter
                if($pseudolength <= 20) {
                    
                    // si le mot de passe est supérieur ou égal à 5 caractères, la fonction continue de s'exécuter
                    if($mdplength > 5) {
                        
                        // Selection des membres par le pseudo récupéré
                        $selectmembrebypseudo = $bdd->prepare('SELECT * FROM Membres WHERE Pseudo = :pseudo');
                        $selectmembrebypseudo->bindParam(':pseudo', $_POST['Pseudo'], PDO::PARAM_STR);
                        $selectmembrebypseudo->execute();
                        $verif2 = $selectmembrebypseudo->rowCount();
                        
                        // Si aucun membre n'utilise ce pseudo, la fonction continue de s'exécuter
                        if($verif2 == 0) {
                            
                            // Si le role récupéré est égale à 0, on définit la variable $formateur à 0 (false)
                            if($_POST['Role'] == 0) {
                                
                                $formateur = 0;
                                
                            } else {
                                
                                // Sinon on définit la variable $formateur à 1 (true)
                                $formateur = 1;
                                
                            }
                            
                            // On définit une variable superadmin à 0 (false)
                            $admin = 0;
                            
                            $getSecureKey = $bdd->prepare('SELECT SECURE_KEY FROM Inscriptions WHERE EMAIL = :email');
                            $getSecureKey->bindParam(':email', $email, PDO::PARAM_STR);
                            $getSecureKey->execute();
                            $secureKey = $getSecureKey->fetch();
                            
                            // On insert le nouveau membre dans la table membres avec touts ses paramètres récupérés
                            $insertmembre = $bdd->prepare('INSERT INTO Membres(Pseudo, Email, MDP, Administrateur, Formateur, Secure_key) VALUES(:pseudo, :email, :mdp, :admin, :formateur, :key)');
                            $insertmembre->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
                            $insertmembre->bindParam(':email', $email, PDO::PARAM_STR);
                            $insertmembre->bindParam(':mdp', $password, PDO::PARAM_STR);
                            $insertmembre->bindParam(':admin', $admin, PDO::PARAM_BOOL);
                            $insertmembre->bindParam(':formateur', $formateur, PDO::PARAM_BOOL);
                            $insertmembre->bindParam(':key', $secureKey['SECURE_KEY'], PDO::PARAM_INT);
                            $insertmembre->execute();
                            
                            // On récupère l'id du membre ajouté pour le réutiliser avec la table options plus bas
                            $iduser = $bdd->prepare('SELECT ID FROM Membres WHERE Email = :email');
                            $iduser->bindParam(':email', $email, PDO::PARAM_STR);
                            $iduser->execute();
                            $id = $iduser->fetch();
                            
                            // On définit le paramètre de confidentialitée du nouveau à 0 (False). Son profil sera donc publique jusqu'à ce qu'il change se paramètre sur son profil
                            $hidden = 0;
                            
                            // Insertion des options de l'utilisateur
                            $insertoption = $bdd->prepare('INSERT INTO Options(HIDDEN, SESSION) VALUES(:hidden, :session)');
                            $insertoption->bindParam(':hidden', $hidden, PDO::PARAM_BOOL);
                            $insertoption->bindValue(':session', $session, PDO::PARAM_INT);
                            $insertoption->execute();
                            
                            // Suppression de l'inscription temporaire du membre
                            $deleteinscription = $bdd->prepare('DELETE FROM Inscriptions WHERE EMAIL = :email');
                            $deleteinscription->bindparam(':email', $email, PDO::PARAM_STR);
                            $deleteinscription->execute();
                            
                            // Insertion de la session de formation du membre
                            $insertformationutilisateur1 = $bdd->prepare('INSERT INTO FormationsUtilisateur(USER, IDENTIFIANT_FORMATION, IDENTIFIANT_SESSION) VALUES(:user, :formation, :session)');
                            $insertformationutilisateur1->bindParam(':user', $id['ID'], PDO::PARAM_INT);
                            $insertformationutilisateur1->bindParam(':formation', $formation, PDO::PARAM_INT);
                            $insertformationutilisateur1->bindParam(':session', $session, PDO::PARAM_INT);
                            $insertformationutilisateur1->execute();
                            
                            // Création de la superglobale de session avec l'id de l'utilisateur crée
                            $_SESSION['id'] = $id['ID'];
                            
                            // Message de confirmation
                            $feedback = "Votre compte a bien été activé ! Vous allez être redirigé vers votre profil !";
                            
                        } else {
                            
                            // Message d'erreur
                            $feedback = "Ce pseudo est déjà pris !";
                            
                        }
                        
                    } else {
                        
                        // Message d'erreur
                        $feedback = "Votre mot de passe est trop court !";
                        
                    }
                    
                } else {
                    
                    // Message d'erreur
                    $feedback = "Votre pseudo ne doit pas dépasser 20 caractères !";
                    
                }
                
            } else {
                
                // Message d'erreur
                $feedback = "Votre pseudo doit être constitué d'au moins 4 caractères !";
                
            }
            
        } else {
            
            // Message d'erreur
            $feedback = "Le compte associé à cette adresse e-mail est déjà activer !";
            
        }
    
    } else {
        
        // Message d'erreur
        $feedback = "Le code captcha entrée ne correspond pas à celui de l'image !";
        
    }

}

// Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}