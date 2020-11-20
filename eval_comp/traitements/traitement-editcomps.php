<?php

include('../config/pdo-connect.php');

if(isset($_POST['ON'])) {

    if(!empty($_POST['ON'])) {
        $session = $_POST['SESSION'];
        $nom = $_POST['ON'];
        $active = 1;

        $activatecomp = $bdd->prepare('UPDATE Matieres SET Active = :active WHERE Nom = :nom AND ID_Session = :session');
        $activatecomp->bindParam(':nom', $nom, PDO::PARAM_STR);
        $activatecomp->bindParam(':session', $session, PDO::PARAM_INT);
        $activatecomp->bindParam(':active', $active, PDO::PARAM_BOOL);
        $activatecomp->execute();
        
        $feedback = "Compétence mise à jour !";

    } else {

        $feedback = "Aucune compétence à activer";

    }

}

if(isset($_POST['OFF'])) {

    if(!empty($_POST['OFF'])) {

        $nom = $_POST['OFF'];
        $session = $_POST['SESSION'];
        $active = 0;

        $desactivercomp = $bdd->prepare('UPDATE Matieres SET Active = :active WHERE Nom = :nom AND ID_Session = :session');
        $desactivercomp->bindParam(':nom', $nom, PDO::PARAM_STR);
        $desactivercomp->bindParam(':session', $session, PDO::PARAM_INT);
        $desactivercomp->bindParam(':active', $active, PDO::PARAM_BOOL);
        $desactivercomp->execute();
        
        $feedback = "Compétence mise à jour !";

    } else {

        $feedback = "Aucune compétence à désactiver !";

    }

}

if(isset($_POST['ADD'])) {

    $nom = htmlspecialchars($_POST['ADD']);
    $formation = htmlspecialchars($_POST['FORMATION']);
    $session = $_POST['SESSION'];
    if(!empty($formation)) {
        $ajoutercomp = $bdd->prepare('INSERT INTO Matieres(Nom, Active, ID_Formation, ID_Session) VALUES(:nom, :active, :formation, :session)');
        $ajoutercomp->bindParam(':nom', $nom, PDO::PARAM_STR);
        $ajoutercomp->bindParam(':session', $session, PDO::PARAM_INT);
        $ajoutercomp->bindParam(':formation', $formation, PDO::PARAM_STR);
        if($_POST['ACTIVE'] == 'Oui') {

            $active = 1;

        } else {

            $active = 0;

        }

        $ajoutercomp->bindParam(':active', $active, PDO::PARAM_BOOL);
        $ajoutercomp->execute();
        
        $feedback = "Compétence ajoutée !";
        
    } else {
        
        $feedback = "Veuillez choisir la formation lié à cette compétence !";
        
    }

}

if(isset($_POST['DEBUT']) && isset($_POST['FIN']) && isset($_POST['FORMATION'])) {
    
    $changerdates = $bdd->prepare('UPDATE Sessions SET DATE_DEBUT = :debut, DATE_FIN = :fin WHERE ID_FORMATION = :formation AND ID_SESSION = :session');
    $changerdates->bindParam(':debut', $_POST['DEBUT'], PDO::PARAM_STR);
    $changerdates->bindParam(':fin', $_POST['FIN'], PDO::PARAM_STR);
    $changerdates->bindParam(':formation', $_POST['FORMATION'], PDO::PARAM_INT);
    $changerdates->bindParam(':session', $_POST['SESSION'], PDO::PARAM_INT);
    $changerdates->execute();
    
    $feedback = "Les dates ont été mises à jour !";
    
}

if(isset($feedback) && !empty($feedback)) {

    echo $feedback;

}

?>