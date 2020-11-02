<?php

include('pdo-connect.php');

if(isset($_POST['ON'])) {

    $q = $bdd->prepare('UPDATE Matieres SET Active = TRUE WHERE Nom = ?');
    $q->execute(array($_POST['ON']));
    $feedback = "Compétence mise à jour !";

}

if(isset($_POST['OFF'])) {

    $q = $bdd->prepare('UPDATE Matieres SET Active = FALSE WHERE Nom = ?');
    $q->execute(array($_POST['OFF']));
    $feedback = "Compétence mise à jour !";

}

if(isset($_POST['ADD'])) {

    $nom = htmlspecialchars($_POST['ADD']);
    $categorie = htmlspecialchars($_POST['CATEGORIE']);
    $q = $bdd->prepare('INSERT INTO Matieres(Nom, Categorie, Active) VALUES(:nom, :categorie, :active)');
    $q->bindParam(':nom', $nom, PDO::PARAM_STR);
    $q->bindParam(':categorie', $categorie, PDO::PARAM_STR);
    if($_POST['ACTIVE'] == 'Oui') {

        $active = 1;

    } else {

        $active = 0;

    }

    $q->bindParam(':active', $active, PDO::PARAM_BOOL);
    $q->execute();
    $feedback = "Compétence ajoutée !";

}

if(isset($feedback) && !empty($feedback)) {

    echo $feedback;

}

?>