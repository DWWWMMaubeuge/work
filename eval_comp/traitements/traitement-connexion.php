<?php

include('../config/pdo-connect.php');

if(isset($_POST['email'])) {

    if(!empty($_POST['email'])) {

        if(!empty($_POST['mdp'])) {
            
            // Stockage des données reçu du formulaire dans des variables
            $email = $_POST['email'];
            $mdp = $_POST['mdp'];
            
            // Selection des informations du compte avec les paramètres passés
            $account = $bdd->prepare('SELECT * FROM Membres WHERE Email = :email AND MDP = :mdp');
            $account->bindParam(':email', $email);
            $account->bindParam(':mdp', $mdp);
            $account->execute();
            // Comptage du nombre de résultats
            $count = $account->rowCount();
            // Si le nombre de résultat n'est pas nul, la fonction s'execute
            if($count != 0) {
                
                // Récupération et stockage des infos du compte de l'utilisateur dans une variable et attribution de la superglobale session avec son id.
                $infos = $account->fetch();
                $_SESSION = [];
                $_SESSION['id'] = $infos['ID'];

            } else {
                
                // Message d'erreur si les infos ne correspondent pas à un compte
                $feedback = "Login incorrect !";

            }

        } else {
            
            // Message d'erreur si l'utilisateur n'a pas entrée son mot de passe
            $feedback = "Veuillez insérer votre mot de passe !";

        }

    } else {
        
        // Message d'erreur si l'utilisateur n'a pas entré son adresse email
        $feedback = "Veuillez insérer votre adresse e-mail !";

    }

}

// Si un message d'erreur ou de confirmation existe et n'est pas vide, on l'affiche
if(isset($feedback) && !empty($feedback)) {

    echo $feedback;

}

?>