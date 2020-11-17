<?php

include('../config/pdo-connect.php');

if(isset($_POST['ON'])) {

    if(!empty($_POST['ON'])) {

        $nom = $_POST['ON'];
        $active = 1;

        $q = $bdd->prepare('UPDATE Matieres SET Active = :active WHERE Nom = :nom');
        $q->bindParam(':nom', $nom, PDO::PARAM_STR);
        $q->bindParam(':active', $active, PDO::PARAM_BOOL);
        $q->execute();
        $feedback = "Compétence mise à jour !";

    } else {

        $feedback = "Aucune compétence à activer";

    }

}

if(isset($_POST['OFF'])) {

    if(!empty($_POST['OFF'])) {

        $nom = $_POST['OFF'];
        $active = 0;

        $q = $bdd->prepare('UPDATE Matieres SET Active = :active WHERE Nom = :nom');
        $q->bindParam(':nom', $nom, PDO::PARAM_STR);
        $q->bindParam(':active', $active, PDO::PARAM_BOOL);
        $q->execute();
        $feedback = "Compétence mise à jour !";

    } else {

        $feedback = "Aucune compétence à désactiver !";

    }

}

if(isset($_POST['ADD'])) {

    $nom = htmlspecialchars($_POST['ADD']);
    $formation = htmlspecialchars($_POST['FORMATION']);
    if(!empty($formation)) {
        $q = $bdd->prepare('INSERT INTO Matieres(Nom, Active, ID_Formation) VALUES(:nom, :active, :formation)');
        $q->bindParam(':nom', $nom, PDO::PARAM_STR);
        $q->bindParam(':formation', $formation, PDO::PARAM_STR);
        if($_POST['ACTIVE'] == 'Oui') {

            $active = 1;

        } else {

            $active = 0;

        }

        $q->bindParam(':active', $active, PDO::PARAM_BOOL);
        $q->execute();
        $feedback = "Compétence ajoutée !";
        
    } else {
        
        $feedback = "Veuillez choisir la formation lié à cette compétence !";
        
    }

}

if(isset($_POST['DEBUT']) && isset($_POST['FIN']) && isset($_POST['FORMATION'])) {
    
    $sql = $bdd->prepare('UPDATE Sessions SET DATE_DEBUT = :debut, DATE_FIN = :fin WHERE ID_FORMATION = :formation');
    $sql->bindParam(':debut', $_POST['DEBUT'], PDO::PARAM_STR);
    $sql->bindParam(':fin', $_POST['FIN'], PDO::PARAM_STR);
    $sql->bindParam(':formation', $_POST['FORMATION'], PDO::PARAM_INT);
    $sql->execute();
    $feedback = "Les dates ont été mises à jour !";
    
}

if(isset($feedback) && !empty($feedback)) {

    echo $feedback;

}

?>