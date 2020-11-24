<?php

include('../config/pdo-connect.php');

if(!empty($_POST['Emails']) && !empty($_POST['Formation']) && !empty($_POST['Role'] && !empty($_POST['Session']))) {
    
    // On crée un tableau vide qui contiendra toutes les adresses e-mails
    $emails = [];
    // On stocke le contenu du textarea du formulaire dans une variable
    $mails = $_POST['Emails'];
    // On remplace les tabulations par des espaces
    $mails = str_replace( "\t", " ", $mails);
    // On stocke toutes les lignes de la variable $mails dans la variable $lignes
    $lignes = explode( "\n", $mails);
    // Pour chaque lignes:
    foreach($lignes as $ligne) {
        
        // On stocke touts les mots de la variable $ligne dans la variable $mots
        $mots = explode(" ", $ligne);
        // Pour chaque mot:
        foreach($mots as $mot) {
            
            // Verification si le mot est une adresse e-mail
            if(filter_var($mot, FILTER_VALIDATE_EMAIL)) { 
                
                // Si le mot est une adresse e-mail on l'insére dans le tableau d'emails
                array_push($emails, $mot); 
                
            }
            
        }
        
    }
    
    // Recupération du nom de la formation selon l'id de la formation envoyé dans l'invitation
    $idformation = $_POST['Formation'];
    $getformation = $bdd->prepare('SELECT FORMATION FROM Formations WHERE ID_FORMATION = :idformation');
    $getformation->bindParam(':idformation', $idformation, PDO::PARAM_INT);
    $getformation->execute();
    $formation = $getformation->fetch();
    
    // Pour chaque adresse e-mail:
    foreach($emails as $email) {
        
         // Création d'une clé aléatoire
         $key = random_int(1147483647, 2147483647);
         // Si le role dans l'invitation est défini en tant que stagiaire, alors le membre sera ajouté en tant que stagiaire
         if($_POST['Role'] == "Stagiaire") { 
             
             $role = 0; 
             
         } else { 
             
             // Sinon il sera ajouté en tant que formateur
             $role = 1; 
             
             
         }
         
         // Stockage de la session de formation récupérée de l'invitation dans une variable
         $session = $_POST['Session'];
        
        // Selection dans la table invitations avec l'email
        $selectInvitationByEmail = $bdd->prepare('SELECT * FROM Invitations WHERE EMAIL = :email');
        $selectInvitationByEmail->bindParam(':email', $email, PDO::PARAM_STR);
        $selectInvitationByEmail->execute();
        $verif = $selectInvitationByEmail->rowCount();
        
        // Si aucune invitation n'existe, la fonction continue de s'éxecuter
        if($verif == 0) {
            
            // Selection dans la table membres avec l'email
            $selectMemberByEmail = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
            $selectMemberByEmail->bindParam(':email', $email, PDO::PARAM_STR);
            $selectMemberByEmail->execute();
            $verif2 = $selectMemberByEmail->rowCount();
            
            // Si aucun membres n'existe avec cet adresse e-mail, la fonction continue de s'éxecuter
            if($verif2 == 0) {
                
                // Selection dans la table inscriptions avec l'email
                $verifpending = $bdd->prepare('SELECT * FROM Inscriptions WHERE EMAIL = :email');
                $verifpending->bindParam(':email', $email, PDO::PARAM_STR);
                $verifpending->execute();
                $countverif = $verifpending->rowCount();
                
                // Si aucun compte temporaire avec cette adresse email est en attente d'activation, la fonction continue de s'executer
                if($countverif == 0) {
                    
                    // Insertion d'une inscription temporaire avec l'email du membre et les détails de l'invitation
                    $insertInscription = $bdd->prepare('INSERT INTO Inscriptions(EMAIL, ID_FORMATION, SECURE_KEY, ROLE, SESSION_NUMBER) VALUES(:Email, :Formation, :Secure_key, :Role, :Session)');
                    $insertInscription->bindParam(':Email', $email, PDO::PARAM_STR);
                    $insertInscription->bindParam(':Formation', $idformation, PDO::PARAM_INT);
                    $insertInscription->bindParam(':Secure_key', $key, PDO::PARAM_INT);
                    $insertInscription->bindParam(':Role', $role, PDO::PARAM_BOOL);
                    $insertInscription->bindParam(':Session', $session, PDO::PARAM_INT);
                    $insertInscription->execute();
                    
                    // Création et envoi d'un mail en php pour l'utilisateur qui vient d'être invité à créer un compte sur le site
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
                    
                    // Message de confirmation
                    $feedback = "La (les) invitation(s) a (ont) bien été envoyée(s) !";
                    
                } else {
                    
                    // Message d'erreur si un compte temporaire existe déjà et est en attente d'activation
                    $feedback = "Une invitation à déjà été envoyée à cette adresse e-mail => $email et l'utilisateur n'a pas encore activé son compte !";
                    
                }
            
            } else {
                
                // Selection de toutes les infos du membres avec l'email
                $userinformations = $bdd->prepare('SELECT * FROM Membres LEFT JOIN Options ON Membres.ID = Options.ID LEFT JOIN FormationsUtilisateur ON Membres.ID = FormationsUtilisateur.USER WHERE Membres.Email = :email');
                $userinformations->bindParam(':email', $email, PDO::PARAM_STR);
                $userinformations->execute();
                $userinfos = $userinformations->fetch();
                
                // Selection de toutes les sessions de l'utilisateur avec les parametres de l'invitations
                $verifuserformations = $bdd->prepare('SELECT * FROM FormationsUtilisateur WHERE USER = :User AND IDENTIFIANT_FORMATION = :Formation AND IDENTIFIANT_SESSION = :Session');
                $verifuserformations->bindParam(':User', $userinfos['ID'], PDO::PARAM_INT);
                $verifuserformations->bindParam(':Formation', $idformation, PDO::PARAM_INT);
                $verifuserformations->bindParam(':Session', $session, PDO::PARAM_INT);
                $verifuserformations->execute();
                // Comptage du nombre de résultat
                $countifexist = $verifuserformations->rowCount();
                
                // Si aucun résultat n'est trouvé la fonction suivante s'execute
                if($countifexist == 0) {
                    
                    // Insertion dans la base de données d'une invitations pour l'utilisateur qui la recevra sur son compte
                    $insertInvitation = $bdd->prepare('INSERT INTO Invitations(Email, FormationID, Session_ID, Role) VALUES(:Email, :Formation, :Session, :Role)');
                    $insertInvitation->bindParam(':Email', $email, PDO::PARAM_STR);
                    $insertInvitation->bindParam(':Formation', $idformation, PDO::PARAM_INT);
                    $insertInvitation->bindParam(':Session', $session, PDO::PARAM_INT);
                    $insertInvitation->bindParam(':Role', $role, PDO::PARAM_BOOL);
                    $insertInvitation->execute();
                    
                    // Création et envoi d'un mail pour prévenir le membre qu'il a reçu une invitation sur son compte
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
                    
                    // Message de confirmation
                    $feedback = "La (les) invitation(s) a (ont) bien été envoyée(s) !";
                    
                } else {
                    
                    // Message d'erreur si l'utilisateur est déjà inscrit à la session pour laquelle il vient d'être invité
                    $feedback = "l'utilisateur associé à cette adresse e-mail est déjà inscrit à cette session => $email <br>";
                }

            }

        } else {
            // Message d'erreur si l'utilisateur a déjà reçu une invitation et que celle-ci est toujours en attente de traitement de sa part
            $feedback = "Une invitation a déjà été envoyé à => $email et est toujours en attente de traitement ! <br>";

        }

    }

} else {
    
    // Message d'erreur si touts les champs requis du formulaire ne sont pas remplis
    $feedback = "Veuillez renseigner une ou des adresse(s) e-mail ainsi que la formation dans lequel le(s) utilisateur(s) doivent être invités, le rôle du/des utilisateur(s) et la session pour laquelle il sera inscrit !";

}

// Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
if(isset($feedback) and !empty($feedback)) {

    echo $feedback;

}

?>