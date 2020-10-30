<?php

include('pdo-connect.php');

function createRange() {
    GLOBAL $bdd;
    $matieres = $bdd->query('SELECT * FROM Matieres ');

    $i = 0;

    while($matiere = $matieres->fetch()) {
        if($i == 0) {
            echo "<div class='row'>";
            echo "<div class='col-sm-6'>";
            echo "<div class='form-group'>";
            echo "<label for='" . $matiere['Nom'] . "'>" . $matiere['Nom'] . "</label>";
            echo "<input type='range'  value='0' class='form-control-range' min='0' step='1' max='100' id='" . $matiere['Nom'] . "' name='" . $matiere['Nom'] . "'>";
            echo "</div>";
            echo "</div>";
            $i--;
        } else {
            echo "<div class='col-sm-6'>";
            echo "<div class='form-group'>";
            echo "<label for='" . $matiere['Nom'] . "'>" . $matiere['Nom'] . "</label>";
            echo "<input type='range'  value='0' class='form-control-range' min='0' step='1' max='100' id='" . $matiere['Nom'] . "' name='" . $matiere['Nom'] . "'>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            $i++;
        }
        
    }
    echo '</div>';

}