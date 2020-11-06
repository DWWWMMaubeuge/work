<?php

include('../config/pdo-connect.php');

if(isset($_POST['Pseudo'])) {
    
    $pseudolength = strlen($_POST['Pseudo']);

    if($pseudolength >= 4) {

        if($pseudolength <= 20) {

            $q = $bdd->prepare('SELECT * FROM Membres WHERE Pseudo = :pseudo');
            $q->bindParam(':pseudo', $_POST['Pseudo'], PDO::PARAM_STR);
            $q->execute();
            $verif1 = $q->rowCount();

            if($verif1 == 0) {

                $q = $bdd->prepare('UPDATE Membres SET Pseudo = :pseudo WHERE ID = :userid');
                $q->bindParam(':pseudo', $_POST['Pseudo'], PDO::PARAM_STR);
                $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $q->execute();

                $feedback = "Operation réussie !";

            } else {

                $feedback = "Ce pseudo est déjà pris !";

            }
        
        } else {

            $feedback = "Votre nouveau pseudo ne doit pas dépasser 20 caractères !";

        }

    } else {

        $feedback = "Votre nouveau pseudo doit être constitué d'au moins 4 caractères !";

    }

}

if(isset($_POST['Site'])) {

    if(!empty($_POST['Site'])) {

        if(filter_var($_POST['Site'], FILTER_VALIDATE_URL)) {

            $q = $bdd->prepare('UPDATE Membres SET Site = :site WHERE ID = :userid');
                $q->bindParam(':site', $_POST['Site'], PDO::PARAM_STR);
                $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $q->execute();

                $feedback = "Operation réussie !";

        } else {

            $feedback = "Veuillez entrer une URL valide !";

        }

    } else {

        $q = $bdd->prepare('UPDATE Membres SET Site = :site WHERE ID = :userid');
        $q->bindValue(':site', null, PDO::PARAM_INT);
        $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $q->execute();

        $feedback = "Operation réussie !";

    }

}

if(isset($_POST['Github'])) {

    if(!empty($_POST['Github'])) {

        $pseudolength = strlen($_POST['Github']);

        if($pseudolength >= 4) {

            if($pseudolength <= 20) {

                $q = $bdd->prepare('UPDATE Membres SET github = :github WHERE ID = :userid');
                $q->bindParam(':github', $_POST['Github'], PDO::PARAM_STR);
                $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $q->execute();

                $feedback = "Operation réussie !";
            
            } else {

                $feedback = "Votre nouveau pseudo ne doit pas dépasser 20 caractères !";

            }

        } else {

            $feedback = "Votre nouveau pseudo doit être constitué d'au moins 4 caractères !";

        
        }
    } else {

        $q = $bdd->prepare('UPDATE Membres SET Github = :github WHERE ID = :userid');
        $q->bindValue(':github', null, PDO::PARAM_INT);
        $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $q->execute();

        $feedback = "Operation réussie !";

    }

}

if(isset($_POST['Prenom'])) {

    if(!empty($_POST['Prenom'])) {

        $prenomlength = strlen($_POST['Prenom']);

        if($prenomlength >= 4) {

            if($prenomlength <= 20 ) {

                $q = $bdd->prepare('UPDATE Membres SET Prenom = :prenom WHERE ID = :userid');
                $q->bindParam(':prenom', $_POST['Prenom'], PDO::PARAM_STR);
                $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $q->execute();

                $feedback = "Operation réussie !";

            } else {

                $feedback = "Votre prénom ne doit pas dépasser 20 caractères !";

            }

        } else {

            $feedback = "Votre prénom doit être composé de 4 caractères !";

        }
    
    } else {

        $q = $bdd->prepare('UPDATE Membres SET Prenom = :prenom WHERE ID = :userid');
        $q->bindValue(':prenom', null, PDO::PARAM_INT);
        $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $q->execute();

        $feedback = "Operation réussie !";

    }

}

if(isset($_POST['Nom'])) {

    if(!empty($_POST['Nom'])) {

        $nomlength = strlen($_POST['Nom']);

        if($nomlength >= 4) {

            if($nomlength <= 20 ) {

                $q = $bdd->prepare('UPDATE Membres SET Nom = :nom WHERE ID = :userid');
                $q->bindParam(':nom', $_POST['Nom'], PDO::PARAM_STR);
                $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
                $q->execute();

                $feedback = "Operation réussie !";

            } else {

                $feedback = "Votre nom ne doit pas dépasser 20 caractères !";

            }

        } else {

            $feedback = "Votre nom doit être composé de 4 caractères !";

        }

    } else {

        $q = $bdd->prepare('UPDATE Membres SET Nom = :nom WHERE ID = :userid');
        $q->bindValue(':nom', null, PDO::PARAM_INT);
        $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $q->execute();

        $feedback = "Operation réussie !";

    }

}

if(isset($_POST['Email'])) {

    if(filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {

        $q = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email');
        $q->bindParam(':email', $_POST['Email'], PDO::PARAM_STR);
        $q->execute();
        $verif2 = $q->rowCount();

        if($verif2 == 0) {

            $q = $bdd->prepare('UPDATE Membres SET Email = :email WHERE ID = :userid');
            $q->bindParam(':email', $_POST['Email'], PDO::PARAM_STR);
            $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $q->execute();

            $feedback = "Operation réussie !";
        
        } else {

            $feedback = "Cette adresse e-mail est déjà utilisé !";

        }

    } else {

        $feedback = "Veuillez entrer une adresse e-mail valide !";

    }

}

if(isset($_POST['Fixe'])) {


    if(!empty($_POST['Fixe'])) {

        if(preg_match('/^(33|0)(3)\d{8}$/', $_POST['Fixe'])) {

            $q = $bdd->prepare('UPDATE Membres SET Fixe = :fixe WHERE ID = :userid');
            $q->bindParam(':fixe', $_POST['Fixe'], PDO::PARAM_STR);
            $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $q->execute();

            $feedback = "Operation réussie !";

        } else {

            $feedback = "Veuillez insérer un numéro de téléphone fixe valide !";

        }

    } else {

        $q = $bdd->prepare('UPDATE Membres SET Fixe = :fixe WHERE ID = :userid');
        $q->bindValue(':fixe', null, PDO::PARAM_INT);
        $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $q->execute();

        $feedback = "Operation réussie !";

    }

}

if(isset($_POST['Mobile'])) {

    if(!empty($_POST['Mobile'])) {

        if(preg_match('/^(33|0)(6|7|9)\d{8}$/', $_POST['Mobile'])) {

            $q = $bdd->prepare('UPDATE Membres SET Mobile = :mobile WHERE ID = :userid');
            $q->bindParam(':mobile', $_POST['Mobile'], PDO::PARAM_STR);
            $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
            $q->execute();

            $feedback = "Operation réussie !";

        } else {
        
            $feedback = "Veuillez insérer un numéro de téléphone mobile valide !";

        }
    
    } else {

        $q = $bdd->prepare('UPDATE Membres SET Mobile = :mobile WHERE ID = :userid');
        $q->bindValue(':mobile', null, PDO::PARAM_INT);
        $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $q->execute();

        $feedback = "Operation réussie !";

    }

}

if(isset($_POST['MDP'])) {

    $mdplength = strlen($_POST['MDP']);

    if($mdplength > 5) {

        $q = $bdd->prepare('UPDATE Membres SET MDP = :mdp WHERE ID = :userid');
        $q->bindParam(':mdp', $_POST['MDP'], PDO::PARAM_STR);
        $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
        $q->execute();

        $feedback = "Operation réussie !";

    } else {

        $feedback = "Votre mot de passe est trop court !";

    }

}

if(isset($_POST['Hidden'])) {

    $visibility = 1;

    $q = $bdd->prepare('UPDATE Options SET HIDDEN = :hidden WHERE ID = :userid');
    $q->bindParam(':hidden', $visibility, PDO::PARAM_BOOL);
    $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
    $q->execute();
    $feedback = "Operation réussie !";

}

if(isset($_POST['Visible'])) {

    $visibility = 0;

    $q = $bdd->prepare('UPDATE Options SET HIDDEN = :visible WHERE ID = :userid');
    $q->bindParam(':visible', $visibility, PDO::PARAM_BOOL);
    $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
    $q->execute();
    $feedback = "Operation réussie !";

}

if(isset($_POST['Formation'])) {

    $formation = intval($_POST['Formation']);


    $q = $bdd->prepare('UPDATE Options SET FORMATION = :formation WHERE ID = :userid');
    $q->bindParam(':formation', $formation, PDO::PARAM_INT);
    $q->bindParam(':userid', $_SESSION['id'], PDO::PARAM_INT);
    $q->execute();
    $feedback = "Operation réussie !";

}

if(isset($feedback)) {

    echo $feedback;

}

?>