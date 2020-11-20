<?php

include('../config/pdo-connect.php');

if(isset($_POST['Email']) && !empty($_POST['Email']) && isset($_POST['Confirmation']) && isset($_POST['Captcha']) && isset($_POST['Idformation']) && isset($_POST['Idsession'])) {
    
    $captcha = $_POST['Captcha'];
    
    if($captcha == $_SESSION['captcha']) {
        
        $email = $_POST['Email'];
        $idFormation = $_POST['Idformation'];
        $idSession = $_POST['Idsession'];
        $confirmation = $_POST['Confirmation'];
        
        if($_POST['Confirmation'] == "Oui") {
            
            $insernewuserformation = $bdd->prepare('INSERT INTO FormationsUtilisateur(USER, IDENTIFIANT_FORMATION, IDENTIFIANT_SESSION) VALUES(:User, :Formation, :Session)');
            $insernewuserformation->bindParam(':User', $_SESSION['id'], PDO::PARAM_INT);
            $insernewuserformation->bindParam(':Formation', $idFormation, PDO::PARAM_INT);
            $insernewuserformation->bindParam(':Session', $idSession, PDO::PARAM_INT);
            $insernewuserformation->execute();
        
            $setformation = $bdd->prepare('UPDATE Options SET SESSION = :Session WHERE ID in (select m.id from Membres m where m.email = :Email) ');
            $setformation->bindParam(':Session', $idSession, PDO::PARAM_INT);
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