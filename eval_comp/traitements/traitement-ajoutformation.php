<?php

include('../config/pdo-connect.php');

// Verification si les données sont envoyés depuis un membre connecté sur le site et si ce membre est un SuperAdmin
if(isset($_SESSION['id']) && $infos['SuperAdmin'] == TRUE) {

    // Si le nom de la formation existe et n'est pas vide, la fonction s'execute
    if(isset($_POST['Formation']) && !empty($_POST['Formation'])) {
        
        // Insertion de la formation dans la base de données
        $insertformation = $bdd->prepare('INSERT INTO Formations(FORMATION) VALUES(:formation)');
        $insertformation->bindParam(':formation', $_POST['Formation'], PDO::PARAM_STR);
        $insertformation->execute();
        // Message de confirmation
        $feedback = "La formation a bien été ajoutée !";
        
    } else {
        
        // Message d'erreur
        $feedback = "Veuillez insérer le nom de la formation !";
        
    }
    
    // Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
    if(isset($feedback) && !empty($feedback)) {
        
        echo $feedback;
        
    }
    
}

?>