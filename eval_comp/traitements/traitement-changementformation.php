<?php

include('../config/pdo-connect.php');

if(isset($_POST['Email']) && !empty($_POST['Email']) && isset($_POST['Confirmation']) && isset($_POST['Captcha'])) {
    
    $captcha = $_POST['Captcha'];
    
    if($captcha == $_SESSION['captcha']) {
        
        $email = $_POST['Email'];
        $idFormation = $_POST['Idformation'];
        $confirmation = $_POST['Confirmation'];
        
        if($_POST['Confirmation'] == "Oui") {
            
            $insernewuserformation = $bdd->prepare('INSERT INTO FormationsUtilisateur(USER, IDENTIFIANT_FORMATION) VALUES(:user, :formation)');
            $insernewuserformation->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
            $insernewuserformation->bindParam(':formation', $idFormation, PDO::PARAM_INT);
            $insernewuserformation->execute();
        
            $setformation = $bdd->prepare('UPDATE Options SET FORMATION = :Formation WHERE ID in (select m.id from Membres m where m.email = :Email) ');
            $setformation->bindParam(':Formation', $idFormation, PDO::PARAM_INT);
            $setformation->bindParam(':Email', $email, PDO::PARAM_STR);
            $setformation->execute();
            
            $deleteinvitation = $bdd->prepare('DELETE FROM Invitations WHERE Email = :email');
            $deleteinvitation->bindParam(':email', $email, PDO::PARAM_STR);
            $deleteinvitation->execute();
            
            $feedback = "Votre choix a bien été pris en compte ! Vous allez être redirigé vers votre profil";
            
        } else {
            
            $sql = $bdd->prepare('DELETE FROM Invitations WHERE Email = :Email');
            $sql->bindParam('Email', $email, PDO::PARAM_STR);
            $sql->execute();
            
            $feedback = "Votre choix a bien été pris en compte ! Vous allez être redirigé vers votre profil";
            
        }
        
    } else {
        
        $feedback = "Le code captcha entrée ne correspond pas à celui de l'image !";
        
    }

} else {
    
    $feedback = "Veuillez remplir touts les champs !";
    
}

if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}