<?php

include('pdo-connect.php');

function createRange() {

    GLOBAL $bdd;

    $front_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? AND Active = TRUE ORDER BY Nom');
    $front_comps->execute(['Front']);

    $back_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? AND Active = TRUE ORDER BY Nom');
    $back_comps->execute(['Back']);

    $other_comps = $bdd->prepare('SELECT * FROM Matieres WHERE Categorie = ? AND Active = TRUE ORDER BY Nom');
    $other_comps->execute(['Autres']);

    $ranges = $bdd->query('SELECT Nom FROM Matieres WHERE Active = TRUE');
    
    echo "<div class='form-group'>";
    echo "<label for='matiere'>Selectionner une matiere</label>";
    echo "<select class='ml-3'name='matiere' id='matiere' onClick='showRange(value)' >";
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
    echo "<div class='row my-5'>";

    while($range = $ranges->fetch()) {

        echo "<input type='range' value='0' class='form-control-range d-none' min='0' step='1' max='100' id='" . $range['Nom'] . "' name='" . $range['Nom'] . "'>";

    }
    
    echo "</div>";

}

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
    echo "<select class='ml-3'name='matiere' id=$id onClick='showRange(value)' >";
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
    echo "<select class='ml-3'name='matiere' id=$id onClick='showRange(value)' >";
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