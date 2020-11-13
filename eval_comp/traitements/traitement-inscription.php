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

            if($pseudolength >= 4) {

                if($pseudolength <= 20) {

                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

                        if($mdplength > 5) {

                            $q = $bdd->prepare('SELECT * FROM Membres WHERE Pseudo = :pseudo');
                            $q->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
                            $q->execute();
                            $verif1 = $q->rowCount();

                            if($verif1 == 0) {

                                $q = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
                                $q->bindParam(':email', $email, PDO::PARAM_STR);
                                $q->execute();
                                $verif2 = $q->rowCount();

                                if($verif2 == 0) {

                                    $sql = $bdd->prepare('INSERT INTO Membres(Pseudo, Email, MDP, Admin) VALUES(:Pseudo, :Email, :MDP, :Admin)');
                                    $sql->bindParam(':Pseudo', $pseudo, PDO::PARAM_STR);
                                    $sql->bindParam(':Email', $email, PDO::PARAM_STR);
                                    $sql->bindParam(':MDP', $mdp, PDO::PARAM_STR);
                                    $sql->bindParam(':Admin', $admin, PDO::PARAM_BOOL);
                                    $sql->execute();

                                    $hidden = 0;

                                    $sql = $bdd->prepare('INSERT INTO Visibilitée(HIDDEN) VALUES(:hidden)');
                                    $sql->bindParam('hidden', $hidden, PDO::PARAM_BOOL);
                                    $sql->execute();

                                    $feedback = "Votre compte a bien été créé ! Vous pouvez désormais vous connecter !";
                            
                                } else {

                                    $feedback = "Cette adresse e-mail est déjà utilisée !";

                                }

                            } else {

                                $feedback = "Ce pseudo est déjà pris !";

                            }

                        } else {

                            $feedback = "Votre mot de passe doit être constitué d'au moins 5 caractères !";

                        }

                    } else {

                        $feedback = "Veuillez insérer une adresse e-mail valide !";

                    }
                
                } else {

                    $feedback = "Votre pseudo ne doit pas dépasser 20 caractères !";

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