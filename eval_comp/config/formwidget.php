<?php 

$sql = $bdd->prepare('SELECT FORMATION FROM Options WHERE ID = :user');
$sql->bindParam(':user', $_SESSION['id'], PDO::PARAM_INT);
$sql->execute();

$formation = $sql->fetch();

function setWidgetValue( $skill ) {
    
    GLOBAL $formation;
    
    if(is_null($skill[2])) {
        $value = 0;
    } else {
        $value = $skill[2];
    }

    $widget = "<p>".$skill[1]."</p><input type='range'  value='" . $value ."' class='form-control-range' min='0' step='1' max='10' id='".$skill[0]."' name='valSkill' onchange=\"MAJ_Value( ".$skill[0].", " . $formation['FORMATION'] . ", this.value, " . $_SESSION['id'] . " )\" >";
    return $widget;

}

function setWidgetValue2( $skill  ) {
    
    GLOBAL $formation;
    
    if(is_null($skill[2])) {
        
        $value = 0;
        
    } else {
        
        $value = $skill[2];
        
    }
    
    $widget = "<div class='m-5'><p>".$skill[1]."</p><input id='number' type='number' value='" . $value ."' name='valSkill' min='0' max='10' onchange=\"MAJ_Value( ".$skill[0].", " . $formation['FORMATION'] . ", this.value, " . $_SESSION['id'] . " )\"></div>";
    return $widget;
}


function setAllWidgetValue( $skills  ) {
    
    $compteur = 1;
    foreach( $skills as $skill ) {
        if($compteur == 1) {
            $widget =  "<div class='row'>";
        }
        $widget .=  "<div class='col-4 mb-5'>";
        $widget .= setWidgetValue( $skill );
        $widget .= "</div>";
        $compteur++;
    }
    $widget .= "</div>";
    return $widget;

}

?>