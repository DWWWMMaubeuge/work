<?php

include('config/pdo-connect.php');

function getEnabledComps($idformation) {

    GLOBAL $bdd;

    $enabled = $bdd->prepare('SELECT * FROM Matieres WHERE ID_Formation = :formation AND Active = TRUE ORDER BY Nom');
    $enabled->bindParam(':formation', $idformation, PDO::PARAM_INT);
    $enabled->execute();

    echo "<div class='form-group'>";
    echo "<label for='matiere'>Selectionner une compétence</label>";
    echo "<select class='ml-3' name='matiere' id='disableComp'>";
    echo "<option selected='selected'></option>";
    while($comps = $enabled->fetch() ){
        echo "<option value='". $comps['Nom'] . "'>". $comps['Nom'] . "</option>";
    }
    echo "</select>";
    echo "</div>";

}

function getDisabledComps($idformation) {

    GLOBAL $bdd;

    $disabled = $bdd->prepare('SELECT * FROM Matieres WHERE ID_Formation = :formation AND Active = FALSE ORDER BY Nom');
    $disabled->bindParam(':formation', $idformation, PDO::PARAM_INT);
    $disabled->execute();
    
    echo "<div class='form-group'>";
    echo "<label for='matiere'>Selectionner une compétence</label>";
    echo "<select class='ml-3'name='matiere' id='enableComp'>";
    echo "<option selected='selected'></option>";
    while($comps = $disabled->fetch() ){
        echo "<option value='". $comps['Nom'] . "'>". $comps['Nom'] . "</option>";
    }
    echo "</select>";
    echo "</div>";
}





?>