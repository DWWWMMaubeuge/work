<?php

include('../config/pdo-connect.php');



if(!empty($_POST['Email'])) {

    $email = $_POST['Email'];
    $key = random_int(1147483647, 2147483647);

    $pseudolength = strlen($pseudo);
    $mdplength = strlen($mdp);

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
                    $msg = "Bonjour,\n\nVous venez de recevoir une invitation à créer un compte sur le site d'auto-évaluation de l'AFPA !\nCliquez ici pour activer votre compte:\nhttp://localhost/Mesprojets/eval_comp/activation.php?account=$key\n\nCet email vous a été envoyé automatiquement. Merci de ne pas y répondre.";
                    $header = "From: noreply@AFPA-formations.com";
                    mail($email, "Activation de votre compte AFPA-Formations", $msg, $header);

                    $feedback = "L'invitation a bien été envoyée !";
                
                } else {

                    $feedback = "Une invitation a déjà été envoyé à cette adresse e-mail !";

                }

            } else {

                $feedback = "Cette adresse e-mail est déjà associé à un compte !";

            }

        } else {

            $feedback = "Veuillez insérer une adresse e-mail valide !";

        }

} else {

    $feedback = "Veuillez renseigner votre adresse e-mail !";

}

if(isset($feedback) and !empty($feedback)) {

    echo $feedback;

}


?>