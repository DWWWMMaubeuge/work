<?php

include ('pdo-connect.php');

if(isset($_POST['nom'])) {

    if(!empty($_POST['nom'])) {

        if(!empty($_POST['prenom'])) {

            if(!empty($_POST['mdp'])) {

                $nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
                $mdp = htmlspecialchars($_POST['mdp']);
                $email = htmlspecialchars($_POST['email']);

                $nomlength = strlen($nom);
                $prenomlength = strlen($prenom);
                $mdplength = strlen($mdp);

                if($prenomlength > 4) {

                    if($nomlength > 4) {

                        if($mdplength > 5) {

                             $sql = $bdd->prepare('INSERT INTO Membres(Nom, Prenom, Email, MDP) VALUES(:Nom, :Prenom, :Email, :MDP)');
                             $sql->bindParam(':Nom', $nom);
                             $sql->bindParam(':Prenom', $prenom);
                             $sql->bindParam(':Email', $email);
                             $sql->bindParam(':MDP', $mdp);
                             $sql->execute();
                             $feedback = "Votre compte a bien été créé !";

                        } else {

                            $feedback = "Votre mot de passe est trop court !";

                        }

                    } else {

                        $feedback = "Votre nom est trop court !";

                    }

                } else {

                    $feedback = "Votre prénom est trop court !";

                }

            } else {

                $feedback = "Veuillez insérer votre mot de passe !";

            }
    
        } else {

            $feedback = "Veuillez insérer votre prénom !";

        }

    } else {

        $feedback = "Veuillez insérer votre nom !";

    }

    if(isset($feedback) and !empty($feedback)) {

        echo $feedback;

    }

}

?>