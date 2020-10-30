<?php

include('pdo-connect.php');

function createRange() {

    GLOBAL $bdd;

    $options = $bdd->query('SELECT * FROM Matieres ');
    $ranges = $bdd->query('SELECT * FROM Matieres ');
    
    echo "<div class='form-group'>";
    echo "<label for='matiere'>Selectionner une matiere</label>";
    echo "<select class='ml-3'name='matiere' id='matiere' onClick='showRange(value)' >";
    echo "<option selected='selected'></option>";

    while($option = $options->fetch()) {

            echo "<option>" . $option['Nom'] . "</option>";
        
    }
    
    echo "</select>";
    echo "</div>";
    echo "<div class='row my-5'>";

    while($range = $ranges->fetch()) {

        echo "<input type='range' value='0' class='form-control-range d-none' min='0' step='1' max='100' id='" . $range['Nom'] . "' name='" . $range['Nom'] . "'>";

    }
    
    echo "</div>";

}