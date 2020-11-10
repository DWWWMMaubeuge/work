<?php

include('../config/pdo-connect.php');



if(!empty($_POST['Emails'])) {
    
    $emails = explode(" ", $_POST['Emails']);
    
    foreach($emails as $email) {
        
         $key = random_int(1147483647, 2147483647);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {


            $q = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
            $q->bindParam(':email', $email, PDO::PARAM_STR);
            $q->execute();
            $verif = $q->rowCount();

            if($verif == 0) {

                $q = $bdd->prepare('SELECT * FROM Inscriptions WHERE EMAIL = :email');
                $q->bindParam(':email', $email, PDO::PARAM_STR);
                $q->execute();
                $verif2 = $q->rowCount();

                if($verif2 == 0) {

                    $sql = $bdd->prepare('INSERT INTO Inscriptions(EMAIL, SECURE_KEY) VALUES(:Email, :Secure_key)');
                    $sql->bindParam(':Email', $email, PDO::PARAM_STR);
                    $sql->bindParam(':Secure_key', $key, PDO::PARAM_INT);
                    $sql->execute();
                    $msg = "Bonjour,\n\nVous venez de recevoir une invitation à créer un compte sur le site d'auto-évaluation de l'AFPA !\nCliquez ici pour activer votre compte:\nhttps://dwm-competences.000webhostapp.com/activation.php?account=$key\n\nCet email vous a été envoyé automatiquement. Merci de ne pas y répondre.";
                    $header = "From: noreply@AFPA-formations.com";
                    mail($email, "Activation de votre compte AFPA-Formations", $msg, $header);

                    $feedback = "La (les) invitation(s) a (ont) bien été envoyée(s) !";
                
                } else {

                    echo "Une invitation a déjà été envoyé à cette adresse e-mail => $email !";
                    return;

                }

            } else {

                echo "Un compte est déjà associé à cette adresse e-mail => $email !";
                return;

            }

        } else {

            echo "Cette adresse e-mail n'est pas valide => $email !";
            return;

        }
    }

} else {

    $feedback = "Veuillez renseigner une ou des adresse(s) e-mail !";

}

if(isset($feedback) and !empty($feedback)) {

    echo $feedback;

}

?>