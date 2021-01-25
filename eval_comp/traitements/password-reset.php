<?php

include('../config/pdo-connect.php');

if(isset($_POST['email']) && !empty($_POST['email'])) {
    
    // Recupération des infos de l'utilisateur selon l'adresse email fournie
    $selectInfos = $bdd->prepare('SELECT Email, Secure_key FROM Membres WHERE Email = :email');
    $selectInfos->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
    $selectInfos->execute();
    $countResult = $selectInfos->rowCount();
    // Si un résultat existe dans la base de données
    if($countResult !== 0) {
        
        $accountInfos = $selectInfos->fetch();
        
        $email = $accountInfos['Email'];
        $key = $accountInfos['Secure_key'];
        
        // Création et envoi d'un mail en php à l'adresse e-mail renseigné par l'utilisateur pour réinitialiser son mot de passe
        $to = $email;
        $subject = "Demande de nouveau mot de passe";
        $from = "noreply@AFPA-Formations.com";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset= utf8' . "\r\n";
        $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        $msg = "<html><body><h1>Bonjour !</h1>\n\n<p>Vous venez de demander la réinitialisation de votre de mot de passe sur le site AFPA-Formations. Cliquez <a href='https://dwm-competences.000webhostapp.com/administration/passwordreset.php?account=$key'>ici</a> pour réinitialiser votre de passe.</p><p>Si vous n'êtes pas à l'origine de cette demande nous vous conseillons d'ignorer cet email</p><p>Cet email vous a été envoyé automatiquement. Merci de ne pas y répondre.</p></body></html>";
        $header = "From: noreply@AFPA-Formations.com";
        mail($to, $subject, $msg, $headers);
    
    // Sinon on affiche un message d'erreur
    } else {
        
        $feedback = "Cette adresse e-mail n'est relié à aucun compte !";
        
    }
    
} else {
    
    $feedback = "Veuillez insérer votre adresse e-mail !";
    
}

if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}