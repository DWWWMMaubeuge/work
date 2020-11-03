<?php

include('../config/pdo-connect.php');


if(!empty($_POST['Pseudo'])) {

    if(!empty($_POST['Email'])) {

        if(!empty($_POST['MDP'])) {

            $pseudo = $_POST['Pseudo'];
            $email = $_POST['Email'];
            $mdp = $_POST['MDP'];
            $admin = 0;

            $pseudolength = strlen($pseudo);
            $mdplength = strlen($mdp);

            if($pseudolength > 4) {

                if($mdplength > 5) {

                    $sql = $bdd->prepare('INSERT INTO Membres(Pseudo, Email, MDP, Admin) VALUES(:Pseudo, :Email, :MDP, :Admin)');
                    $sql->bindParam(':Pseudo', $pseudo, PDO::PARAM_STR);
                    $sql->bindParam(':Email', $email, PDO::PARAM_STR);
                    $sql->bindParam(':MDP', $mdp, PDO::PARAM_STR);
                    $sql->bindParam(':Admin', $admin, PDO::PARAM_BOOL);
                    $sql->execute();

                    $feedback = "Votre compte a bien été créé ! Vous pouvez désormais vous <a href='connexion.php'>connecter</a> !";

                } else {

                    $feedback = "Votre mot de passe doit être constitué d'au moins 5 caractères !";

                }

            } else {

                $feedback = "Votre pseudo doit être constitué d'au moins 4 caractères !";

            }

        } else {

            $feedback = "Veuillez renseigner votre mot de passe !";

        }

    } else {

        $feedback = "Veuillez renseigner votre adresse e-mail !";

    }

} else {
    
    $feedback = "Veuillez renseigner votre pseudo !";

}

if(isset($feedback) and !empty($feedback)) {

    echo $feedback;

}


?>