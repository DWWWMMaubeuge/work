<?php

include('../config/pdo-connect.php');

if(isset($_POST['Admin']) && !empty($_POST['Admin'])) {
    
    // On définit la variable admin à 1 (True)
    $admin = 1;
    // On update le membre et on le passe en admin
    $updatemember = $bdd->prepare('UPDATE Membres SET Admin = :admin WHERE Pseudo = :pseudo');
    $updatemember->bindParam(':admin', $admin, PDO::PARAM_INT);
    $updatemember->bindParam(':pseudo', $_POST['Admin'], PDO::PARAM_STR);
    $updatemember->execute();
    
    $feedback = "Le compte a bien été passé en administrateur !";
    
}

// Si un message d'erreur ou de confirmation existe et qu'il n'est pas vide, on l'affiche
if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}


?>