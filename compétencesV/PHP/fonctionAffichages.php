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



function formationChoice(){
    echo "<div>Choisissez ici la formation à modifier</div>";
    echo "<select name='formation' id='formation'> ";
    echo "<option value=''>--formation de travail--</option>";
    echo "<option value='1'>Developpeur</option>";
    echo "<option value='2'>Formateur</option>";
    echo "<option value='3'>Ingénieur</option>";
    echo "<option value='4'>Pilote</option>";
    echo "</select>";
}
function supMatSelect($skills){

    echo "<div class='mt-5'>Choisissez ici une ou des matieres à desactiver</div>";
    echo "<select name='mat1' id='mat1'>";
    echo "<option value=''>--Matieres à desactiver--</option>";
    foreach ($skills as $array){
        echo "<option value=".$array['id'].">".$array['matiere']."</option>";
    }
    echo "</select>";
}
function addMatSelect(){
    echo "<div class='mt-5'>Choisissez ici une ou des matieres à activer</div>";
    echo "<select name='mat2' id='mat2'>";
    echo "<option value=''>--Matieres à activer--</option>";
    echo "<option value='1'>React</option>";
    echo "<option value='2'>VueJS</option>";
    echo "<option value='3'>Node</option>";
    echo "<option value='4'>Wordpress</option>";
    echo "</select>";

}

?>