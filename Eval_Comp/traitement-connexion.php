<?php

if(isset($_POST['email'])) {

    if(!empty($_POST['email'])) {

        if(!empty($_POST['mdp'])) {

            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);

            $account = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email AND MDP = :mdp');
            $account->bindParam(':email', $email);
            $account->bindParam(':mdp', $mdp);
            $account->execute();
            $count = $account->rowCount();
            $infos = $account->fetch();
            if($count != 0) {

                $_SESSION = [];
                $_SESSION['id'] = $infos['ID'];
                header('location: index.php');
                exit();

            } else {

                $feedback = "Cette combinaison ne correspond à aucun compte !";

            }

        } else {

            $feedback = "Veuillez insérer votre mot de passe !";

        }

    } else {

        $feedback = "Veuillez insérer votre nom !";

    }

}

?>