<?php

include('../config/pdo-connect.php');

if(isset($_POST['Captcha']) && !empty($_POST['Captcha'])) {
    
    if(isset($_POST['newpassword']) && !empty($_POST['newpassword'])) {
        
        if($_SESSION['captcha'] == $_POST['Captcha']) {
    
            $email = $_POST['email'];
            $newpassword = $_POST['newpassword'];
            $key = $_POST['key'];
            
            $checkSecurityParams = $bdd->prepare('SELECT ID, Email, Secure_key FROM Membres WHERE Email = :email AND Secure_key = :key');
            $checkSecurityParams->bindParam(':email', $email, PDO::PARAM_STR);
            $checkSecurityParams->bindParam(':key', $key, PDO::PARAM_INT);
            $checkSecurityParams->execute();
            $check = $checkSecurityParams->rowCount();
            
            if($check !== 0) {
                
                $reinitialisePassword = $bdd->prepare('UPDATE Membres SET MDP = :newpassword WHERE Email = :email AND Secure_key = :key');
                $reinitialisePassword->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
                $reinitialisePassword->bindParam(':email', $email, PDO::PARAM_STR);
                $reinitialisePassword->bindParam(':key', $key, PDO::PARAM_INT);
                $reinitialisePassword->execute();
                
                $userID = $checkSecurityParams->fetch();
                
                $_SESSION['id'] = $userID['ID'];
                
                $feedback = "Opération réussie ! Vous allez être redirigé vers votre profil !";
                
            } else {
                
                $feedback = "Faille de sécurité détecté, abandon de l'opération !";
                
            }
            
        } else {
            
            $feedback = "Le code captcha entrée ne correspond pas à celui de l'image !";
            
        }
        
    }
    
}

// Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}