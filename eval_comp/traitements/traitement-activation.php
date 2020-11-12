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
        
        $q = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
        $q->bindParam(':email', $email, PDO::PARAM_STR);
        $q->execute();
        $verif = $q->rowCount();
        
        if($verif == 0) {
        
            if($pseudolength >= 4) {
                
                if($pseudolength <= 20) {
                    
                    if($mdplength > 5) {
                    
                        $q = $bdd->prepare('SELECT * FROM Membres WHERE Pseudo = :pseudo');
                        $q->bindParam(':pseudo', $_POST['Pseudo'], PDO::PARAM_STR);
                        $q->execute();
                        $verif2 = $q->rowCount();
                        
                        if($verif2 == 0) {
                            
                            $admin = 0;
                            
                            $q = $bdd->prepare('INSERT INTO Membres(Pseudo, Email, MDP, Admin) VALUES(:pseudo, :email, :mdp, :admin)');
                            $q->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
                            $q->bindParam(':email', $email, PDO::PARAM_STR);
                            $q->bindParam(':mdp', $password, PDO::PARAM_STR);
                            $q->bindParam(':admin', $admin, PDO::PARAM_BOOL);
                            $q->execute();
                            
                            $hidden = 0;
    
                            $q = $bdd->prepare('INSERT INTO Options(HIDDEN, FORMATION) VALUES(:hidden, :formation)');
                            $q->bindParam(':hidden', $hidden, PDO::PARAM_BOOL);
                            $q->bindValue(':formation', $formation, PDO::PARAM_INT);
                            $q->execute();
                            
                            $q = $bdd->prepare('DELETE FROM Inscriptions WHERE EMAIL = :email');
                            $q->bindparam(':email', $email, PDO::PARAM_STR);
                            $q->execute();
                            
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