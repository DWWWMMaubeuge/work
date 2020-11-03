<?php

include('config/pdo-connect.php');

function getEnabledComps($id) {

    GLOBAL $bdd;

    $front_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? AND Active = TRUE ORDER BY Nom');
    $front_comps->execute(['Front']);

    $back_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? AND Active = TRUE ORDER BY Nom');
    $back_comps->execute(['Back']);

    $other_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? AND Active = TRUE ORDER BY Nom');
    $other_comps->execute(['Autres']);
    
    echo "<div class='form-group'>";
    echo "<label for='matiere'>Selectionner une compétence</label>";
    echo "<select class='ml-3'name='matiere' id=$id>";
    echo "<option selected='selected'></option>";
    echo "<optgroup label='Front'>";

    while($option = $front_comps->fetch()) {

        echo "<option>" . $option['Nom'] . "</option>";
        
    }

    echo "</optgroup>";
    echo "<optgroup label='Back'>";

    while($option = $back_comps->fetch()) {

        echo "<option>" . $option['Nom'] . "</option>";
    
    }

    echo "</optgroup>";
    echo "<optgroup label='Autres'>";

    while($option = $other_comps->fetch()) {

        echo "<option>" . $option['Nom'] . "</option>";
    
    }

    echo "</optgroup>";
    echo "</select>";
    echo "</div>";

}

function getDisabledComps($id) {

    GLOBAL $bdd;

    $front_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? AND Active = FALSE ORDER BY Nom');
    $front_comps->execute(['Front']);

    $back_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? Active = FALSE ORDER BY Nom');
    $back_comps->execute(['Back']);

    $other_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? Active = FALSE ORDER BY Nom');
    $other_comps->execute(['Autres']);
    
    echo "<div class='form-group'>";
    echo "<label for='matiere'>Selectionner une compétence</label>";
    echo "<select class='ml-3'name='matiere' id=$id>";
    echo "<option selected='selected'></option>";
    echo "<optgroup label='Front'>";

    while($option = $front_comps->fetch()) {

        echo "<option>" . $option['Nom'] . "</option>";
        
    }

    echo "</optgroup>";
    echo "<optgroup label='Back'>";

    while($option = $back_comps->fetch()) {

        echo "<option>" . $option['Nom'] . "</option>";
    
    }

    echo "</optgroup>";
    echo "<optgroup label='Autres'>";

    while($option = $other_comps->fetch()) {

        echo "<option>" . $option['Nom'] . "</option>";
    
    }

    echo "</optgroup>";
    echo "</select>";
    echo "</div>";

}





?>