<?php

include('../config/pdo-connect.php');

if(isset($_POST['Pseudo']) && isset($_POST['Password']) && isset($_POST['Email']) && isset($_POST['Captcha']) && isset($_POST['Formation'])) {
    
    $captcha = $_POST['Captcha'];
    
    if($captcha == $_SESSION['captcha']) {
    
        $pseudo = $_POST['Pseudo'];
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        $formation = $_POST['Formation'];
    
        $pseudolength = strlen($pseudo);
        $mdplength = strlen($password);
        
        $selectmembrebyemail = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
        $selectmembrebyemail->bindParam(':email', $email, PDO::PARAM_STR);
        $selectmembrebyemail->execute();
        $verif = $selectmembrebyemail->rowCount();
        
        if($verif == 0) {
        
            if($pseudolength >= 4) {
                
                if($pseudolength <= 20) {
                    
                    if($mdplength > 5) {
                    
                        $selectmembrebypseudo = $bdd->prepare('SELECT * FROM Membres WHERE Pseudo = :pseudo');
                        $selectmembrebypseudo->bindParam(':pseudo', $_POST['Pseudo'], PDO::PARAM_STR);
                        $selectmembrebypseudo->execute();
                        $verif2 = $selectmembrebypseudo->rowCount();
                        
                        if($verif2 == 0) {
                            
                            $admin = 0;
                            $superadmin = 0;
                            
                            $insertmembre = $bdd->prepare('INSERT INTO Membres(Pseudo, Email, MDP, Admin, SuperAdmin) VALUES(:pseudo, :email, :mdp, :admin, :superadmin)');
                            $insertmembre->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
                            $insertmembre->bindParam(':email', $email, PDO::PARAM_STR);
                            $insertmembre->bindParam(':mdp', $password, PDO::PARAM_STR);
                            $insertmembre->bindParam(':admin', $admin, PDO::PARAM_BOOL);
                            $insertmembre->bindParam(':superadmin', $superadmin, PDO::PARAM_BOOL);
                            $insertmembre->execute();
                            
                            $iduser = $bdd->prepare('SELECT ID FROM Membres WHERE Email = :email');
                            $iduser->bindParam(':email', $email, PDO::PARAM_STR);
                            $iduser->execute();
                            $id = $iduser->fetch();
                            
                            $hidden = 0;
    
                            $insertoption = $bdd->prepare('INSERT INTO Options(HIDDEN, FORMATION) VALUES(:hidden, :formation)');
                            $insertoption->bindParam(':hidden', $hidden, PDO::PARAM_BOOL);
                            $insertoption->bindValue(':formation', $formation, PDO::PARAM_INT);
                            $insertoption->execute();
                            
                            $deleteinscription = $bdd->prepare('DELETE FROM Inscriptions WHERE EMAIL = :email');
                            $deleteinscription->bindparam(':email', $email, PDO::PARAM_STR);
                            $deleteinscription->execute();
                            
                            $insertformationutilisateur1 = $bdd->prepare('INSERT INTO FormationsUtilisateur(USER, IDENTIFIANT_FORMATION) VALUES(:user, :formation)');
                            $insertformationutilisateur1->bindParam(':user', $id['ID'], PDO::PARAM_INT);
                            $insertformationutilisateur1->bindParam(':formation', $formation, PDO::PARAM_INT);
                            $insertformationutilisateur1->execute();
                            
                            $feedback = "Votre compte a bien été activé ! Vous pouvez désormais vous connecter !";
                            
                        } else {
                            
                            $feedback = "Ce pseudo est déjà pris !";
                            
                        }
                        
                    } else {
                        
                        $feedback = "Votre mot de passe est trop court !";
                        
                    }
                    
                } else {
                    
                    $feedback = "Votre pseudo ne doit pas dépasser 20 caractères !";
                    
                }
                
            } else {
                
                $feedback = "Votre pseudo doit être constitué d'au moins 4 caractères !";
                
            }
            
        } else {
            
            $feedback = "Le compte associé à cette adresse e-mail est déjà activer !";
            
        }
    
    } else {
        
        $feedback = "Le code captcha entrée ne correspond pas à celui de l'image !";
        
    }

}

if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}