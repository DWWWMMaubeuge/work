<?php

include('../config/pdo-connect.php');

// Verification si les données sont envoyés depuis un membre connecté sur le site
if(isset($_SESSION['id'])) {

    // Si l'utilisateur modifie son pseudo :
    if(isset($_POST['Pseudo'])) {
        
        // Stockage du nombre de caractères de son nouveau pseudo et stockage dans une variable
        $pseudolength = strlen($_POST['Pseudo']);
        
        // Si le nombre de caractères de son nouveau pseudo est égal ou supérieur à 4, la fonction s'execute
        if($pseudolength >= 4) {
            
            // Si le nombre de caractères de son nouveau pseudo est inférieur ou égal à 20, la fonction s'execute
            if($pseudolength <= 20) {
                
                // Vérification si un membre ne possède pas déjà le pseudo entré par l'utilisateur
                $verifpseudo = $bdd->prepare('SELECT * FROM Membres WHERE Pseudo = :pseudo');
                $verifpseudo->bindParam(':pseudo', $_POST['Pseudo'], PDO::PARAM_STR);
                $verifpseudo->execute();
                // Comptage du nombre de résultats
                $verif1 = $verifpseudo->rowCount();
                
                // Si aucun membre ne possède ce pseudo, la fonction s'execute
                if($verif1 == 0) {
                    
                    // Mise à jour du pseudo de l'utilisateur avec son nouveau pseudo
                    $updatepseudo = $bdd->prepare('UPDATE Membres SET Pseudo = :pseudo WHERE ID = :userid');
                    $updatepseudo->bindParam(':pseudo', $_POST['Pseudo'], PDO::PARAM_STR);
                    $updatepseudo->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                    $updatepseudo->execute();
                    
                    // Message de confirmation
                    $feedback = "Opération réussie !";
    
                } else {
                    
                    // Message d'erreur si le pseudo que l'utilisateur a entré est déjà pris par un autre membre
                    $feedback = "Ce pseudo est déjà pris !";
    
                }
            
            } else {
                
                // Message d'erreur si le nouveau pseudo de l'utilisateur dépasse 20 caractères
                $feedback = "Votre nouveau pseudo ne doit pas dépasser 20 caractères !";
    
            }
    
        } else {
            // Message d'erreur si le nouveau pseudo de l'utilisateur n'est pas composé d'au moins 4 caractères
            $feedback = "Votre nouveau pseudo doit être constitué d'au moins 4 caractères !";
    
        }
    
    }
    
    // Si l'utilisateur modifie le lien vers son site personnel:
    if(isset($_POST['Site'])) {
        
        // Si l'utilisateur a entrée quelque chose:
        if(!empty($_POST['Site'])) {
            
            // Si ce que l'utilisateur a entrée est bien une url valide:
            if(filter_var($_POST['Site'], FILTER_VALIDATE_URL)) {
                
                // Mise à jour du lien vers le site personnel de l'utilisateur
                $updatesite = $bdd->prepare('UPDATE Membres SET Site = :site WHERE ID = :userid');
                $updatesite->bindParam(':site', $_POST['Site'], PDO::PARAM_STR);
                $updatesite->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $updatesite->execute();
                
                // Message de confirmation
                $feedback = "Opération réussie !";
    
            } else {
                
                // Message d'erreur si ce que l'utilisateur à entré n'est pas une url valide
                $feedback = "Veuillez entrer une URL valide !";
    
            }
        
        // Si l'utilisateur n'a rien entré mais a envoyé le formulaire:
        } else {
            
            // Mise à jour du site personnel de l'utilisateur pour le mettre vide dans la base de données
            $updatesiperso = $bdd->prepare('UPDATE Membres SET Site = :site WHERE ID = :userid');
            $updatesiperso->bindValue(':site', null, PDO::PARAM_INT);
            $updatesiperso->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $updatesiperso->execute();
            
            // Message de confirmation
            $feedback = "Opération réussie !";
    
        }
    
    }
    
    // Si l'utilisateur modifie son pseudo github:
    if(isset($_POST['Github'])) {
        
        // Si l'utilisateur a entrée quelque chose:
        if(!empty($_POST['Github'])) {
            
            // Stockage du nombre de caractères de son nouveau pseudo et stockage dans une variable
            $pseudolength = strlen($_POST['Github']);
            
            // Si son nouveau pseudo github est supérieur ou égal à 4 caractères:
            if($pseudolength >= 4) {
                
                // Si son nouveau pseudo est inférieur ou égal à 20 caractères:
                if($pseudolength <= 20) {
                    
                    // Mise à jour de son pseudo github
                    $updategithub = $bdd->prepare('UPDATE Membres SET github = :github WHERE ID = :userid');
                    $updategithub->bindParam(':github', $_POST['Github'], PDO::PARAM_STR);
                    $updategithub->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                    $updategithub->execute();
                    
                    // Message de confirmation
                    $feedback = "Opération réussie !";
                
                } else {
                    
                    // Message d'erreur si son nouveau pseudo dépasse 20 caractères
                    $feedback = "Votre nouveau pseudo ne doit pas dépasser 20 caractères !";
    
                }
    
            } else {
                    
                // Message d'erreur si son nouveau pseudo n'est pas constitué d'au moins 4 caractères
                $feedback = "Votre nouveau pseudo doit être constitué d'au moins 4 caractères !";
            
            }
            
        // Si l'utilisateur n'a rien entré mais a envoyer le formulaire:
        } else {
            
            // Mise à jour de son pseudo github pour le mettre vide dans la base de données
            $emptygithub = $bdd->prepare('UPDATE Membres SET Github = :github WHERE ID = :userid');
            $emptygithub->bindValue(':github', null, PDO::PARAM_INT);
            $emptygithub->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $emptygithub->execute();
            
            // Message de confirmation
            $feedback = "Opération réussie !";
    
        }
    
    }
    
    // Si l'utilisateur modifie son prénom:
    if(isset($_POST['Prenom'])) {
        
        // Si l'utilisateur a entré quelque chose:
        if(!empty($_POST['Prenom'])) {
            
            // Comptage du nombre de caractères de son nouveau prénom et stockage du nombre dans une variable
            $prenomlength = strlen($_POST['Prenom']);
            
            // Si son prénom est constitué d'au moins 4 caractères:
            if($prenomlength >= 4) {
                
                // Si son prénom ne dépasse pas 20 caractères:
                if($prenomlength <= 20 ) {
                    
                    // Mise à jour de son prénom dans la base de données
                    $updateprenom = $bdd->prepare('UPDATE Membres SET Prenom = :prenom WHERE ID = :userid');
                    $updateprenom->bindParam(':prenom', $_POST['Prenom'], PDO::PARAM_STR);
                    $updateprenom->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                    $updateprenom->execute();
                    
                    // Message de confirmation
                    $feedback = "Opération réussie !";
    
                } else {
                    
                    // Message d'erreur si son prénom dépasse 20 caractères
                    $feedback = "Votre prénom ne doit pas dépasser 20 caractères !";
    
                }
    
            } else {
                
                // Message d'erreur si son prénom n'est pas composé d'au moins 4 caractères
                $feedback = "Votre prénom doit être composé de 4 caractères !";
    
            }
            
        // Si l'utilisateur n'a rien entré mais a envoyé le formulaire:
        } else {
            
            // Mise à jour de son prénom dans la base de données pour le mettre vide
            $emptyprenom = $bdd->prepare('UPDATE Membres SET Prenom = :prenom WHERE ID = :userid');
            $emptyprenom->bindValue(':prenom', null, PDO::PARAM_INT);
            $emptyprenom->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $emptyprenom->execute();
            
            // Message de confirmation
            $feedback = "Opération réussie !";
    
        }
    
    }
    
    // Si l'utilisateur modifie son nom:
    if(isset($_POST['Nom'])) {
        
        // Si l'utilisateur a entré quelque chose:
        if(!empty($_POST['Nom'])) {
            
            // Comptage du nombre de caractères de son nouveau nom et stockage du nombre dans une variable
            $nomlength = strlen($_POST['Nom']);
            
            // Si son nom est composé d'au minimum 4 caractères:
            if($nomlength >= 4) {
                
                // Si son nom ne dépasse pas 20 caractères:
                if($nomlength <= 20 ) {
                    
                    // Mise à jour de son nom dans la base de données
                    $updatenom = $bdd->prepare('UPDATE Membres SET Nom = :nom WHERE ID = :userid');
                    $updatenom->bindParam(':nom', $_POST['Nom'], PDO::PARAM_STR);
                    $updatenom->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                    $updatenom->execute();
                    
                    // Message de confirmation
                    $feedback = "Opération réussie !";
    
                } else {
                    
                    // Message d'erreur si son nom dépasse 20 caractères
                    $feedback = "Votre nom ne doit pas dépasser 20 caractères !";
    
                }
    
            } else {
                
                // Message d'erreur si son nom n'ai pas composé d'au moins 4 caractères
                $feedback = "Votre nom doit être composé de 4 caractères !";
    
            }
        
        // Si l'utilisateur n'a rien entré mais a quand même envoyé le formulaire:
        } else {
            
            // Mise à jour de son nom dans la base de données pour le mettre vide
            $emptynom = $bdd->prepare('UPDATE Membres SET Nom = :nom WHERE ID = :userid');
            $emptynom->bindValue(':nom', null, PDO::PARAM_INT);
            $emptynom->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $emptynom->execute();
            
            // Message de confirmation
            $feedback = "Opération réussie !";
    
        }
    
    }
    
    // Si l'utilisateur modifie son adresse email:
    if(isset($_POST['Email'])) {
        
        // Si sa nouvelle adresse email est une adresse email valide:
        if(filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
            
            // Selection dans la tables membres avec sa nouvelle adresse email
            $selectemailmembres = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
            $selectemailmembres->bindParam(':email', $_POST['Email'], PDO::PARAM_STR);
            $selectemailmembres->execute();
            // Comptage du nombre de résultats
            $verif2 = $selectemailmembres->rowCount();
            
            // Si aucun résultat n'est retourné:
            if($verif2 == 0) {
                
                // Mise à jour de son adresse email dans la base de données avec sa nouvelle adresse email
                $updateEmail= $bdd->prepare('UPDATE Membres SET Email = :email WHERE ID = :userid');
                $updateEmail->bindParam(':email', $_POST['Email'], PDO::PARAM_STR);
                $updateEmail->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $updateEmail->execute();
                
                // Message de confirmation
                $feedback = "Opération réussie !";
            
            } else {
                
                // Message d'erreur si un membre possède la même adresse e-mail que celle entrée par l'utilisateur
                $feedback = "Cette adresse e-mail est déjà utilisé !";
    
            }
    
        } else {
            
            // Message d'erreur si la nouvelle adresse e-mail entrée par l'utilisateur n'est pas valide
            $feedback = "Veuillez entrer une adresse e-mail valide !";
    
        }
    
    }
    
    // Si l'utilisateur modifie son numéro de téléphone fixe:
    if(isset($_POST['Fixe'])) {
        
        // Si l'utilisateur a entré un numéro de téléphone fixe:
        if(!empty($_POST['Fixe'])) {
            
            // Si le numéro de téléphone fixe entré et un numéro valide:
            if(preg_match('/^(33|0)(3)\d{8}$/', $_POST['Fixe'])) {
                
                // Mise à jour du numéro de téléphone fixe de l'utilisateur dans la base de données
                $updateFixe= $bdd->prepare('UPDATE Membres SET Fixe = :fixe WHERE ID = :userid');
                $updateFixe->bindParam(':fixe', $_POST['Fixe'], PDO::PARAM_STR);
                $updateFixe->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $updateFixe->execute();
                
                // Message de confirmation
                $feedback = "Opération réussie !";
    
            } else {
                
                // Message d'erreur si le numéro entré n'est pas un numéro valide
                $feedback = "Veuillez insérer un numéro de téléphone fixe valide !";
    
            }
            
        // Si l'utilisateur n'a rien entré mais a quand même envoyé le formulaire:
        } else {
            
            // Mise à jour du numéro de téléphone fixe du membre pour le mettre vide dans la base de données
            $emptyFixe = $bdd->prepare('UPDATE Membres SET Fixe = :fixe WHERE ID = :userid');
            $emptyFixe->bindValue(':fixe', null, PDO::PARAM_INT);
            $emptyFixe->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $emptyFixe->execute();
            
            // Message de confirmation
            $feedback = "Opération réussie !";
    
        }
    
    }
    
    // Si l'utilisateur modifie son numéro de téléphone mobile:
    if(isset($_POST['Mobile'])) {
        
        // Si l'utilisateur a entré un numéro de téléphone mobile:
        if(!empty($_POST['Mobile'])) {
            
            // Si le numéro de téléphone mobile entré est valide:
            if(preg_match('/^(33|0)(6|7|9)\d{8}$/', $_POST['Mobile'])) {
                
                // Mise à jour du numéro de téléphone de l'utilisateur dans la base de données
                $updateMobile= $bdd->prepare('UPDATE Membres SET Mobile = :mobile WHERE ID = :userid');
                $updateMobile->bindParam(':mobile', $_POST['Mobile'], PDO::PARAM_STR);
                $updateMobile->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $updateMobile->execute();
                
                // Message de confirmation
                $feedback = "Opération réussie !";
    
            } else {
                
                // Message d'erreur si le numéro entré n'est pas un numéro de téléphone mobile valide
                $feedback = "Veuillez insérer un numéro de téléphone mobile valide !";
    
            }
        
        // Si l'utilisateur n'a rien entré mais a quand même envoyé le formulaire
        } else {
            
            // Mise à jour du numéro de téléphone mobile de l'utilisateur pour le mettre vide dans la base de données
            $emptyMobile = $bdd->prepare('UPDATE Membres SET Mobile = :mobile WHERE ID = :userid');
            $emptyMobile->bindValue(':mobile', null, PDO::PARAM_INT);
            $emptyMobile->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $emptyMobile->execute();
            
            // Message de confirmation
            $feedback = "Opération réussie !";
    
        }
    
    }
    
    // Si l'utilisateur modifie son mot de passe:
    if(isset($_POST['MDP'])) {
        
        // Si son nouveau mot de passe n'est pas vide:
        if(!empty($_POST['MDP'])) {
            
            // Mise à jour de son mot de passe dans la base de données
            $updatePassword = $bdd->prepare('UPDATE Membres SET MDP = :mdp WHERE ID = :userid');
            $updatePassword->bindParam(':mdp', $_POST['MDP'], PDO::PARAM_STR);
            $updatePassword->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $updatePassword->execute();
            
            // Message de confirmation
            $feedback = "Opération réussie !";
        
        } else {
            
            // Message d'erreur si son nouveau mot de passe est vide
            $feedback = "Votre mot de passe ne dois pas être vide !";
            
        }
    
    }
    
    // Si l'utilisateur passe son profil en mode privé:
    if(isset($_POST['Hidden'])) {
        
        // Initialisation de la variable hidden à 1 (true)
        $hidden = 1;
        
        // Mise à jour de ses options pour passer son profil en caché, dans la base de données
        $setHidden = $bdd->prepare('UPDATE Options SET HIDDEN = :hidden WHERE ID = :userid');
        $setHidden->bindParam(':hidden', $hidden, PDO::PARAM_BOOL);
        $setHidden->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $setHidden->execute();
        
        // Message de confirmation
        $feedback = "Opération réussie !";
    
    }
    
    // Si l'utilisateur passe son profil en mode publique:
    if(isset($_POST['Visible'])) {
        
        // Initialisation de la variable hidden à 0 (False)
        $hidden = 0;
        
        // Mise à jour de ses options pour passer son profil en publique, dans la base de données
        $setVisible = $bdd->prepare('UPDATE Options SET HIDDEN = :visible WHERE ID = :userid');
        $setVisible->bindParam(':visible', $hidden, PDO::PARAM_BOOL);
        $setVisible->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $setVisible->execute();
        
        // Message de confirmation
        $feedback = "Opération réussie !";
    
    }
    
    // Si l'utilisateur modifie sa formation active:
    if(isset($_POST['Formation'])) {
        
        // Récupération de l'id de la session qu'il définie en tant qu'active
        $formation = intval($_POST['Formation']);
    
        // Mise à jour de sa session active dans ses options dans la base de données
        $setSession = $bdd->prepare('UPDATE Options SET FORMATION = :formation WHERE ID = :userid');
        $setSession->bindParam(':formation', $formation, PDO::PARAM_INT);
        $setSession->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $setSession->execute();
        
        // Message de confirmation
        $feedback = "Opération réussie !";
    
    }
    
    // Si l'utilisateur modifie son image de profil:
    if(isset($_FILES['inputAvatar']) AND !empty($_FILES['inputAvatar']['name'])) {
        
        // Taille max d'une image = 2Mo
        $tailleMax = 2000000;
        // Extension valides
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
        // Si la taille du nouvel avatar de l'utilisateur ne dépasse pas la taille maximum:
        if($_FILES['inputAvatar']['size'] <= $tailleMax) {
            
            // Stockage de l'extension de l'image dans une variable
            $extensionUpload = strtolower(substr(strrchr($_FILES['inputAvatar']['name'], '.'), 1));
            // Si l'extension de l'image uploadé fais partie des extension valides:
            if(in_array($extensionUpload, $extensionsValides)) {
                
                // Création du chemin d'upload de l'image avec l'id de l'utilisateur pour le nom du fichier
                $chemin = "../images/avatars/".$_SESSION['id'].".".$extensionUpload;
                // Stockage du résultat du déplacement de l'image uploadé vers le chemin
                $resultat = move_uploaded_file($_FILES['inputAvatar']['tmp_name'], $chemin);
                // Si le résultat est positif:
                if($resultat) {
                    
                    // stockage du nom du nouvel avatar de l'utilisateur
                    $avatar = $_SESSION['id'].".".$extensionUpload;
                    // Mise à jour de l'avatar de l'utilisateur dans la base de données
                    $updateavatar = $bdd->prepare('UPDATE Membres SET Avatar = :avatar WHERE ID = :id');
                    $updateavatar->bindParam(':avatar', $avatar, PDO::PARAM_STR);
                    $updateavatar->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
                    $updateavatar->execute();
                    
                    // On retourne le nom du fichier uploadé pour que javascript puisse le mettre à jour au niveau du front
                    $feedback = $chemin;
                    
                } else {
                    
                    // Message d'erreur si une erreur survient
                    $feedback = "Erreur: Une erreur est survenue durant l'importation de votre nouvelle photo de profil !";
                    
                }
                
            } else {
                
                // Message d'erreur si l'extension n'est pas valide
                $feedback = "Erreur: Votre nouvelle photo de profil dois être au format JPG, JPEG, GIF ou PNG !";
                
            }
            
        } else {
            
            // Message d'erreur si le nouvel avatar dépasse la taille autorisé
            $feedback = "Erreur: Votre nouvelle photo de profil ne doit pas dépasser 2Mo !";
            
        }
        
    }
    
    // Si l'utilisateur modifie sa session active:
    if(isset($_POST['Session'])) {
    
    // Mise à jour de sa session active dans la table options avec l'id de la session qu'il a choisis
    $formationactive = $bdd->prepare('UPDATE Options SET SESSION = :session WHERE ID = :user');
    $formationactive->bindParam(':session', $_POST['Session'], PDO::PARAM_INT);
    $formationactive->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
    $formationactive->execute();
    
    // Message de confirmation
    $feedback = "Votre formation active a bien été mise à jour !";

    }
    
    // Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
    if(isset($feedback) && !empty($feedback)) {
    
        echo $feedback;
    
    }
    
}

?>