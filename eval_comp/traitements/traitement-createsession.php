<?php

include('../config/pdo-connect.php');

if(isset($_POST['Formation']) && isset($_POST['Debut']) && isset($_POST['Fin']) && isset($_POST['Emplacement'])) {
    
    $formation = $_POST['Formation'];
    $debut = $_POST['Debut'];
    $fin = $_POST['Fin'];
    $emplacement = $_POST['Emplacement'];
    $active = 1;
    
    $createSession = $bdd->prepare('INSERT INTO Sessions(DATE_DEBUT, DATE_FIN, ID_FORMATION, STATUS, EMPLACEMENT) VALUES(:debut, :fin, :formation, :active, :emplacement)');
    $createSession->bindParam(':debut', $debut, PDO::PARAM_STR);
    $createSession->bindParam(':fin', $fin, PDO::PARAM_STR);
    $createSession->bindParam(':formation', $formation, PDO::PARAM_INT);
    $createSession->bindParam(':active', $active, PDO::PARAM_BOOL);
    $createSession->bindParam(':emplacement', $emplacement, PDO::PARAM_STR);
    $createSession->execute();
    
    $feedback = "La session a bien été créée !";
    
}

if(isset($feedback) && !empty($feedback)) {
    
    echo $feedback;
    
}


?>