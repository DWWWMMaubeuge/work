<?php

include('../config/pdo-connect.php');

if(!empty($_POST['Emails']) && !empty($_POST['Formation']) && !empty($_POST['Role'] && !empty($_POST['Session']))) {
    
    $emails = [];
    
    $mails = $_POST['Emails'];
    $mails = str_replace( "\t", " ", $mails);
    $lignes = explode( "\n", $mails);
    foreach($lignes as $ligne) {
        
        $mots = explode(" ", $ligne);
        foreach($mots as $mot) {
            
            if(filter_var($mot, FILTER_VALIDATE_EMAIL)) { 
                
                array_push($emails, $mot); 
                
            }
            
        }
        
    }
    
    $idformation = $_POST['Formation'];
    $getformation = $bdd->prepare('SELECT FORMATION FROM Formations WHERE ID_FORMATION = :idformation');
    $getformation->bindParam(':idformation', $idformation, PDO::PARAM_INT);
    $getformation->execute();
    $formation = $getformation->fetch();
    
    foreach($emails as $email) {
        
         $key = random_int(1147483647, 2147483647);
         if($_POST['Role'] == "Stagiaire") { 
             
             $role = 0; 
             
         } else { 
             
             $role = 1; 
             
             
         }
         $session = $_POST['Session'];

        $selectInvitationByEmail = $bdd->prepare('SELECT * FROM Invitations WHERE EMAIL = :email');
        $selectInvitationByEmail->bindParam(':email', $email, PDO::PARAM_STR);
        $selectInvitationByEmail->execute();
        $verif = $selectInvitationByEmail->rowCount();

        if($verif == 0) {
            
            $selectMemberByEmail = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
            $selectMemberByEmail->bindParam(':email', $email, PDO::PARAM_STR);
            $selectMemberByEmail->execute();
            $verif2 = $selectMemberByEmail->rowCount();

            if($verif2 == 0) {
                
                $verifpending = $bdd->prepare('SELECT * FROM Inscriptions WHERE EMAIL = :email');
                $verifpending->bindParam(':email', $email, PDO::PARAM_STR);
                $verifpending->execute();
                $countverif = $verifpending->rowCount();
                
                if($countverif == 0) {
                
                    $insertInscription = $bdd->prepare('INSERT INTO Inscriptions(EMAIL, ID_FORMATION, SECURE_KEY, ROLE, SESSION_NUMBER) VALUES(:Email, :Formation, :Secure_key, :Role, :Session)');
                    $insertInscription->bindParam(':Email', $email, PDO::PARAM_STR);
                    $insertInscription->bindParam(':Formation', $idformation, PDO::PARAM_INT);
                    $insertInscription->bindParam(':Secure_key', $key, PDO::PARAM_INT);
                    $insertInscription->bindParam(':Role', $role, PDO::PARAM_BOOL);
                    $insertInscription->bindParam(':Session', $session, PDO::PARAM_INT);
                    $insertInscription->execute();
                    
                    $to = $email;
                    $subject = "Activation de votre compte AFPA-Formations";
                    $from = "noreply@AFPA-Formations.com";
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset= utf8' . "\r\n";
                    $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    $msg = "<html><body><h1>Bonjour !</h1>\n\n<p>Vous venez de recevoir une invitation à créer un compte et à rejoindre une session pour la formation " . $formation['FORMATION'] . " sur le site d'auto-évaluation de l'AFPA ! Cliquez <a href='https://dwm-competences.000webhostapp.com/administration/activation.php?account=$key'>ici</a> pour activer votre compte.</p><p>Cet email vous a été envoyé automatiquement. Merci de ne pas y répondre.</p></body></html>";
                    $header = "From: noreply@AFPA-Formations.com";
                    mail($to, $subject, $msg, $headers);
                    $feedback = "La (les) invitation(s) a (ont) bien été envoyée(s) !";
                    
                } else {
                    
                    $feedback = "Une invitation à déjà été envoyée à cette adresse e-mail => $email et l'utilisateur n'a pas encore activé son compte !";
                    
                }
            
            } else {
                
                $userinformations = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN FormationsUtilisateur ON Membres.ID = FormationsUtilisateur.USER WHERE Membres.Email = :email');
                $userinformations->bindParam(':email', $email, PDO::PARAM_STR);
                $userinformations->execute();
                $userinfos = $userinformations->fetch();
                
                $verifuserformations = $bdd->prepare('SELECT * FROM FormationsUtilisateur WHERE USER = :User AND IDENTIFIANT_FORMATION = :Formation AND IDENTIFIANT_SESSION = :Session');
                $verifuserformations->bindParam(':User', $userinfos['ID'], PDO::PARAM_INT);
                $verifuserformations->bindParam(':Formation', $idformation, PDO::PARAM_INT);
                $verifuserformations->bindParam(':Session', $session, PDO::PARAM_INT);
                $verifuserformations->execute();
                $countifexist = $verifuserformations->rowCount();
                
                if($countifexist == 0) {

                    $insertInvitation = $bdd->prepare('INSERT INTO Invitations(Email, FormationID, Session_ID, Role) VALUES(:Email, :Formation, :Session, :Role)');
                    $insertInvitation->bindParam(':Email', $email, PDO::PARAM_STR);
                    $insertInvitation->bindParam(':Formation', $idformation, PDO::PARAM_INT);
                    $insertInvitation->bindParam(':Session', $session, PDO::PARAM_INT);
                    $insertInvitation->bindParam(':Role', $role, PDO::PARAM_BOOL);
                    $insertInvitation->execute();
                    
                    $to = $email;
                    $subject = "Invitation à une nouvelle session de formation";
                    $from = "noreply@AFPA-Formations.com";
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset= utf8' . "\r\n";
                    $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    $msg = "<html><body><h1>Bonjour !</h1>\n\n<p>Vous avez été invité à intégrer une session dans la formation " . $formation['FORMATION'] . " sur le site d'auto-évaluation de l'AFPA ! Cliquez <a href='https://dwm-competences.000webhostapp.com/administration/confirmer-invitation.php?account=$key'>ici</a> pour accepter ou décliner cette invitation.</p><p>Cet email vous a été envoyé automatiquement. Merci de ne pas y répondre.</p></body></html>";
                    $header = "From: noreply@AFPA-Formations.com";
                    mail($to, $subject, $msg, $headers);

                    $feedback = "La (les) invitation(s) a (ont) bien été envoyée(s) !";
                    
                } else {
                    
                    $feedback = "l'utilisateur associé à cette adresse e-mail est déjà inscrit à cette session => $email <br>";
                }

            }

        } else {

            $feedback = "Une invitation a déjà été envoyé à => $email et est toujours en attente de traitement ! <br>";

        }

    }

} else {

    $feedback = "Veuillez renseigner une ou des adresse(s) e-mail ainsi que la formation dans lequel le(s) utilisateur(s) doivent être invités, le rôle du/des utilisateur(s) et la session pour laquelle il sera inscrit !";

}

if(isset($feedback) and !empty($feedback)) {

    echo $feedback;

}

?>