<?php

include('pdo-connect.php');

if(isset($_POST['nom'])) {

    if(!empty($_POST['nom'])) {

        if(!empty($_POST['prenom'])) {

            if(!empty($_POST['mdp'])) {

                $pseudo = $_POST['pseudo'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $mdp = $_POST['mdp'];
                $email = $_POST['email'];
                $admin = 0;
                $telfixe = $_POST['telfixe'];
                $telmobile = $_POST['telmobile'];
                $git = $_POST['pseudogit'];
                $site = $_POST['liensite'];


                $nomlength = strlen($nom);
                $prenomlength = strlen($prenom);
                $mdplength = strlen($mdp);

                if($prenomlength > 4) {

                    if($nomlength > 4) {

                        if($mdplength > 5) {

                             $sql = $bdd->prepare('INSERT INTO Membres(Pseudo, Nom, Prenom, Email, MDP, Admin, Fixe, Mobile, Github, Site) VALUES(:Pseudo, :Nom, :Prenom, :Email, :MDP, :Admin, :Fixe, :Mobile, :Github, :Site)');
                             $sql->bindParam(':Pseudo', $pseudo);
                             $sql->bindParam(':Nom', $nom);
                             $sql->bindParam(':Prenom', $prenom);
                             $sql->bindParam(':Email', $email);
                             $sql->bindParam(':MDP', $mdp);
                             $sql->bindParam(':Admin', $admin, PDO::PARAM_BOOL);
                             $sql->bindParam(':Fixe', $telfixe);
                             $sql->bindParam(':Mobile', $telmobile);
                             $sql->bindParam(':Github', $git);
                             $sql->bindParam(':Site', $site);
                             $sql->execute();

                             $feedback = "Votre compte a bien été créé ! Vous pouvez désormais vous <a href='connexion.php'>connecter</a> !";

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