<?php

include('../config/pdo-connect.php');


if(isset($_POST['Formation']) && !empty($_POST['Formation'])) {
    
    $insertformation = $bdd->prepare('INSERT INTO Formations(FORMATION) VALUES(:formation)');
    $insertformation->bindParam(':formation', $_POST['Formation'], PDO::PARAM_STR);
    $insertformation->execute();
    
    $feedback = "La formation a bien été ajoutée !";
    
} else {
    
    $feedback = "Veuillez insérer le nom de la formation !";
    
}

if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}


?>