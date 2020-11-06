<?php
include 'SQLfonctionAffichage.php';




function formLabel($skills,$note,$i){

    foreach( $skills as $array) {
        //var_dump($array);
        echo "<div class='col-xs-12 col-sm-12 col-md-3'>";
            echo "<div class='input-group mb-3'>";
            echo "<div class='input-group-prepend'>";
            echo "<label class='input-group-text bg-primary text-white' style='width:6rem' for=" . $array['id'] . ">" . $array['matiere'] . "</label>";
            echo "</div>";
            echo "<input class='form-control border border-primary' type='number' step='1' id=" . $array['id'] . " name=" . $array['matiere'] . " min='0' max='10' value=" . $note[$i]['eval'] . ">";
            echo "</div>";
        echo "</div>";
        $i++;
    }
}

function formMat($skills,$note,$i){
    echo "<div class='c1 container mb-5 border border-primary p-5 background text-center text-white' >";
    echo "<div class='row'>";
    echo "<div class='col-xs-8 col-sm-10 col-md-11'><h1 class='responsiveTitle'>Bonjour ". $_SESSION['prenom']." ". $_SESSION['nom']."</h1></div>";
    echo "<div class ='col-xs-4 col-sm-2 col-md-1'><div class='backDoor' onclick='disconnect()'><div class='door'><i class='fas fa-sign-out-alt'></i></div></div></div>";
    echo "</div>";
    echo "</div>";
    echo "<div class=' c2 container background mb-5 border border-primary p-5'>";
    echo "<div class='row'>";
    formLabel($skills,$note,$i);
    echo "</div>";
}
?>