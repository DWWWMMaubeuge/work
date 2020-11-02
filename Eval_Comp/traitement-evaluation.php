<?php

    include('pdo-connect.php');
    
    $results = array();

    foreach($_POST as $key => $value) {

        array_push($results, $value);

    }

    $results = array_combine(range(1, count($results)), array_values($results));

    array_pop($results);

    $user = $_POST['USER'];

    $insert = $bdd->prepare('INSERT INTO Resultats(ID_USER, ID_MATIERE, RESULTAT) VALUES (:user, :matiere, :resultat)');

    foreach($results as $key => $value) {
        $insert->bindParam(':user', $user);
        $insert->bindParam(':matiere', $key);
        $insert->bindParam(':resultat', $value);
        $insert->execute();
    }

    $feedback = "Votre auto-évaluation a bien été envoyé ! Vous allez maintenant être redirigé vers l'accueil.";

if(isset($feedback) && !empty($feedback)) {

    echo $feedback;

}


?>