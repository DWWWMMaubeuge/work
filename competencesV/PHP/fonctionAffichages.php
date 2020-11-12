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
    echo "<div class ='col-xs-4 col-sm-2 col-md-1'><div class='backDoor' onclick='disconnect()'><div class='door'><i class='fas fa-sign-out-alt porte'></i></div></div></div>";
    echo "</div>";
    echo "</div>";
    echo "<div class=' c2 container background mb-5 border border-primary p-5'>";
    echo "<div class='row'>";
    formLabel($skills,$note,$i);
    echo "</div>";
}


function deactivateMat($skills){

    echo "<div class='mt-5'>Choisissez ici une ou des matieres à desactiver</div>";
    echo "<select class='form-control' name='mat1' id='mat1'>";
    echo "<option value=''>--Matieres à desactiver--</option>";
    foreach ($skills as $array){
        echo "<option value=".$array['id'].">".$array['matiere']."</option>";
    }
    echo "</select>";
}

function activateMat($skills){
    echo "<div class='mt-5'>Choisissez ici une ou des matieres à activer</div>";
    echo "<select class='form-control' name='mat2' id='mat2'>";
    echo "<option value=''>--Matieres à activer--</option>";
    foreach ($skills as $array) {
        echo "<option value=" . $array['id'] . ">" . $array['matiere'] . "</option>";
    }
    echo "</select>";

}

function insertMat(){
    echo "<div class='mt-5'>Choisissez ici une ou des matieres à ajouter</div>";
    echo "<input class='form-control' type=text name='mat3' placeholder='Entrez la matiere à ajouter'>";
}


function selectForm($formation){
    echo "<label for='exampleFormControlSelect1'>Formation</label>";
    echo "<select class='form-control' id='exampleFormControlSelect1' name='formation'>";
    echo "<option value=\"\">--Choisissez votre formation--</option>";
    foreach ($formation as $array){
        echo "<option value=".$array['id'].">".$array['name']."</option>";
    }
    echo "</select>";
}


?>